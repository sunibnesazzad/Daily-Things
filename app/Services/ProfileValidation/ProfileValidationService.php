<?php
/**
 * Created by PhpStorm.
 * User: rat
 * Date: 9/19/17
 * Time: 3:48 PM
 */

namespace App\Services\ProfileValidation;


use App\BaseSettings\Settings;
use App\Models\PendingVerification;
use App\Models\Verified;
use App\Responses\ApiResponse;
use App\Services\FileUploadService;
use App\Services\Push\PushNotificationService;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ProfileValidationService
{
    /**
     * @var PendingVerification
     */
    private $pendingVerification;
    /**
     * @var Verified
     */
    private $verified;
    /**
     * @var ApiResponse
     */
    private $apiResponse;

    private $fileUploadService;
    private $pushNotificationService;


    /**
     * ProfileValidationService constructor.
     * @param PendingVerification $pendingVerification
     * @param Verified $verified
     * @param ApiResponse $apiResponse
     */
    public function __construct(PendingVerification $pendingVerification,Verified $verified,ApiResponse $apiResponse, FileUploadService $fileUploadService, PushNotificationService $pushNotificationService)
    {
        $this->pendingVerification = $pendingVerification;
        $this->verified = $verified;
        $this->apiResponse = $apiResponse;
        $this->fileUploadService = $fileUploadService;
        $this->pushNotificationService = $pushNotificationService;
    }


    public function storeUserVerificationRequest($request)
    {
        try{
            $uploadedFile = $request->file('verification_file')->store('verification','uploads');
            $this->pendingVerification->create(
                [
                    'user_uuid' => $request->get('uuid'),
                    'token' => $request->get('token'),
                    'verification_image' => $uploadedFile,
                ]
            );

            return $this->apiResponse->success('Request received successfully.');
        }catch (Exception $exception){
            return $this->apiResponse->error('Something went wrong');
        }

    }

    public function getAllPendingRequests()
    {
        return $this->pendingVerification->paginate(10);
    }

    public function accept($id)
    {
        try{

            $pendingVerification = $this->pendingVerification->find($id);
            $this->verified->create([
                'user_uuid' => $pendingVerification->user_uuid,
                'token' => $pendingVerification->token,
                'status' => 'verified',
            ]);

            $this->fileUploadService->removeFile($pendingVerification->verification_image,'uploads');
            try{
                $this->pushNotificationService->sendVerificationMessageToUser(Settings::$company_name, Settings::$ACCEPTED_MESSAGE, $id);
            }catch (\Exception $e){

            }

            $pendingVerification->delete();
            return true;
        }catch (Exception $exception){
            return false;
        }

    }

    public function reject($id)
    {
        try{
            $pendingVerification = $this->pendingVerification->find($id);
            $this->fileUploadService->removeFile($pendingVerification->verification_image,'uploads');
            try{
                $this->pushNotificationService->sendVerificationMessageToUser(Settings::$company_name, Settings::$REJECTED_MESSAGE, $id);
            }catch (\Exception $e){

            }
            $pendingVerification->delete();
            return true;
        }catch (Exception $exception){
            return false;
        }
    }

    public function isVerifiedUser($request)
    {
        try{
            $verifiedUser = $this->verified->where('user_uuid', $request->uuid)->first();
            $response = (object)[
                'verified' => false
            ];
            if($verifiedUser){
                $response->verified = true;
            }

            return $this->apiResponse->success($response);
        }catch (\Exception $exception){
            return $this->apiResponse->error('Something Went Wrong');
        }
    }

}