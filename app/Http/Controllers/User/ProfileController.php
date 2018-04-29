<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Services\UserService;


class ProfileController extends Controller
{
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return $this
     */
    public function profile()
    {
        return view('auth.profile')->with('user',Auth::user());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdate(Request $request)
    {
    	
    	$user= $this->userService->profileUpdate($request);
        if($user){
        	return redirect()->back()->with('user',$user)->with('success','Your profile is updated successfully.');
    	}
        return redirect()->back()->with('error','Something went wrong. Try again.');


    }
    
    public function profilePicChange()
    {
        return view('auth.profile-pic-change')->with('user',Auth::user());
    }

    public function doProfilePicChange(Request $request)
    {

        if($request->hasFile('photo')){
    		$user= $this->userService->profilePicUpdate($request);
    		if($user){
        		return redirect()->back()->with('user',$user)->with('success','Your Profile Picture is updated successfully.');
    		}
        }
        return redirect()->back()->with('error','Please, Upload your picture.'); 
        
        
    }
}
