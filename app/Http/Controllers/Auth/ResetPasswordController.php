<?php
/**
 * Created by PhpStorm.
 * User: Masiur
 * Date: 11/8/17
 * Time: 5:45 PM
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    /* overriding method
    public function showResetForm()
    {

    }
    */

    /* overriding method
    public function reset()
    {

    }
    */

}