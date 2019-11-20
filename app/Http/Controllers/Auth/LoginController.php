<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ='/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin($request)
    {
        $messages = [
            'email.required' => 'Please enter your email to Sign-In.',
            'email.email'=>'Please Enter Valid Email Address.',
            'passwor.required'=>'Please enter your password to Sign-In.'
            
        ];
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ], $messages);
    }

    
    public function showLoginForm()
    {
        $data['assets_admin']=url('assets/admin');
        return view('admin.auth.login',$data);
    }
    protected function sendFailedLoginResponse($request)
    {
        set_flash_msg('flash_error',[trans('auth.failed')][0]);
        return redirect('/login');
    }


    protected function authenticated($request, $user)
    {
       if($user['user_role']==1){
           set_flash_msg('flash_success','Admin, You are signIn Successfully.');
       }elseif(($user['user_role']==2)){
        if($user['user_status']==1){
            set_flash_msg('flash_success','Vendor, You are signIn Successfully.');
        }else{
            if($user['user_status']==3){
                set_flash_msg('flash_error','Your account activation is pending. Contact Admin For activation.');
            }elseif($user['user_status']==2){
                set_flash_msg('flash_error','Your account deactivate by admin, Contact Admin For activation.');
            }else{
                set_flash_msg('flash_error','Contact Admin, somthing went wrong');
            }
            $this->guard()->logout();
        }
       }else{
            set_flash_msg('flash_error','Contact Admin, somthing went wrong');
            $this->guard()->logout();       
        }
        $this->user_redirection();
    }

    public function user_redirection(){
        if(auth()->user()){
            $this->redirectTo='/admin'; 
        }else{
            $this->redirectTo='/login';
        }
    }
    public function logout()
    {
        $this->guard()->logout();
        session()->invalidate();
        set_flash_msg('flash_success','You are signout Successfully.');
        return redirect('/login');
    }
    
}

