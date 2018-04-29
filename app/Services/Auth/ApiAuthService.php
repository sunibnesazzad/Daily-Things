<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:02 PM
 */

namespace App\Services\Auth;


use App\BaseSettings\Settings;
use App\Responses\ApiResponse;
use App\Services\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class ApiAuthService
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var ApiResponse
     */
    private $apiResponse;

    /**
     * ApiAuthService constructor.
     * @param UserService $userService
     * @param ApiResponse $apiResponse
     */
    public function __construct(UserService $userService,ApiResponse $apiResponse)
    {
        $this->userService = $userService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->apiResponse->error("invalid credentials");
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->apiResponse->error("could not create token");
        }

        return $this->apiResponse->success($token);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRefreshToken()
    {
        try {
            $token = JWTAuth::refresh(JWTAuth::getToken());
            return $this->apiResponse->success($token);
        } catch (\Exception $e) {
            return $this->apiResponse->error("invalid token");
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request)
    {
        $password = bcrypt($request->get('password'));
        $request->merge(['password' => $password]);
        $data = $request->only(['name','email','password']);
        $user =  $this->userService->create($data);
        $user->assignRole(Settings::$client_role);
        return $user;
    }
}