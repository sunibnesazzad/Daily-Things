<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UserLogin;
use App\Http\Requests\Auth\UserRegistration;
use App\Services\Auth\WebAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $maxAttempts = 5; // number of attempts
    public $decayMinutes = 1; // total lock time in minute
    public $redirectTo = '/'; // redirect path
    use AuthenticatesUsers;

    /**
     * @var WebAuthService
     */
    private $webAuthService;

    /**
     * AuthController constructor.
     * @param WebAuthService $webAuthService
     */
    public function __construct( WebAuthService $webAuthService )
    {
        $this->webAuthService = $webAuthService;
    }


    public function login()
    {
        return view('auth.login');
    }

    public function doLogin( UserLogin $request )
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->webAuthService->signIn($request)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

            return redirect()->route('dashboard.main')->with('success', 'Welcome back!');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return redirect()->back()->withInput($request->all())->with('error', 'Invalid Email/Password.');

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'You have now been signed out.');
        }
        return redirect()->route('login')->with('error', 'You need to login first.');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister( UserRegistration $request )
    {
        try {
            $user = $this->webAuthService->register($request);
            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard.main')->with('success',
                    'Welcome, Your account created successfully.');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withInput()->with('error', 'something went wrong. Try again.');
        }
    }

    public function reset()
    {
        return view('auth.password-reset')->with('user', Auth::user());
    }


    public function doReset( Request $request )
    {
        $rules = [
            'password' => 'required|confirmed'
        ];
        $this->validate($request, $rules);
        $user = $this->webAuthService->resetPassword($request);
        if ($user) {
            return redirect()->back()->with('success', 'Password Updated Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong. Try again.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginUsingId( $id )
    {
        if (Auth::check()) {
            Auth::logout();
        }
        \auth()->loginUsingId($id);
        return redirect('dashboard');
    }


}
