<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function showLinkRequestForm()
    {
        $data['assets_admin']=url('assets/admin');
        return view('admin.auth.forgot',$data);
    }
    protected function sendResetLinkResponse($response)
    {
        set_flash_msg('flash_success', trans($response));
        return back();
    }
    protected function sendResetLinkFailedResponse($request, $response)
    {
        set_flash_msg('flash_error', trans($response));
        return back();
    }
    protected function validateEmail($request)
    {   $messages = [
            'email.required' =>'Please enter email address for reset password.',
            'email.email' =>'Please enter valid email address for reset password.',

        ];
        $this->validate($request, ['email' => 'required|email'],$messages);
    }
    public function __construct()
    {
        $this->middleware('guest');
    }
   
}
