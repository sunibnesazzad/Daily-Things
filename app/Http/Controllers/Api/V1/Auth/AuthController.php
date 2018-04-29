<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Requests\Auth\UserRegistration;
use App\Responses\ApiResponse;
use App\Services\Auth\ApiAuthService;
use App\Transformers\Api\UserTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    /**
     * @var ApiResponse
     */
    private $apiResponse;
    /**
     * @var ApiAuthService
     */
    private $authService;
    /**
     * @var UserTransformer
     */
    private $userTransformer;

    /**
     * AuthController constructor.
     * @param ApiResponse $apiResponse
     * @param ApiAuthService $authService
     * @param UserTransformer $userTransformer
     */
    public function __construct(ApiResponse $apiResponse,ApiAuthService $authService,UserTransformer $userTransformer)
    {

        $this->apiResponse = $apiResponse;
        $this->authService = $authService;
        $this->userTransformer = $userTransformer;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $response = $this->authService->login($request);
        return $response;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        return $this->authService->getRefreshToken();
    }

    /**
     * @param UserRegistration $request
     * @return mixed
     */
    public function register(UserRegistration $request)
    {
        $user = $this->authService->register($request);
        if($user){
            return $this->apiResponse->item($user,new UserTransformer);
        }

        return $this->apiResponse->error('something went wrong.');
    }
}
