<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, 
            [
                'email1' => 'required|email',
                'password1' => 'required|min:6',
            ],
            [
                'email1.required' => 'The email field is required.',
                'email1.email'   =>  'Invalid email',
                'password1.required'   =>  'The password field is required.',
                'password1.min'      => 'The password length should be more than 6 characters.'
            ]
    );
   
        if(auth()->attempt(array('email' => $request->email1, 'password' => $request->password1)))
        {
            if (auth()->user()->usertype != 0) {
                return response()->json([
                      'success' => true,
                      'msg'=>'Logged in successfully.'
                      ]);
            }else{
                return response()->json([
                      'success' => true,
                      'msg'=>'Logged in successfully.'
                      ]);
            }
        }else{
            return response()->json([
                      'success' => false,
                      'msg'=>'Invalid detail'
                      ]);
        }
          
    }
}
