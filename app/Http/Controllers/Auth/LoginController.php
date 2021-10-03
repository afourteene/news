<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        //validate
        $data = $this->validateForm($request);
        //check user and password
        $userLogin = Auth::attempt($data);
         //login and redirect
        if($userLogin)
        {   
            return redirect()->route('dashboard');
        }
        else{
            return back()->with('failed',true);
        }
       
        


    }


    protected function validateForm(Request $request)
    {
        return $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    public function logout()
    
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('login')->with('success',true);
        }

    }
    
}
