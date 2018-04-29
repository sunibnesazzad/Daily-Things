<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/8/17
 * Time: 11:37 AM
 */

namespace App\Services\Auth;


use App\BaseSettings\Settings;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebAuthService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * WebAuthService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param $request
     * @return bool
     */
    public function signIn($request)
    {
        return Auth::attempt($this->getCredentials($request),$request->has('remember'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getCredentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
    }

    public function register(Request $request)
    {
        $password = Hash::make($request->get('password'));
        $request->merge(['password' => $password]);
        $data = $request->only(['name','email','password']);
        $user =  $this->userService->create($data);
        $user->assignRole(Settings::$client_role);
        return $user;
    }

    public function resetPassword(Request $request)
    {
        $password = bcrypt($request->get('password'));
        $request->merge(['password' => $password]);
        $data = $request->only(['password']);
        $user =  $this->userService->update($data,\auth()->user()->id);
        return $user;
    }
}