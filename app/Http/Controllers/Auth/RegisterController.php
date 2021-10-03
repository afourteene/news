<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function validateForm(Request $request)
    {
        return $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'role' => 'author',
            'password' => Hash::make($data['password']),
        ]);
    }


    public function index()
    {
        return view('auth.register');
    }



    public function register(Request $request)
    {
        //$data [] = ['title' => 'ثبت نام کاربر جدید.','body' =>111,'sender' => 'aa','reciver' => 'admin','status' => 'new','user_id' => 1];
        //dd($data);
        //validate
        $data = $this->validateForm($request);
        //store user
        $create = $this->create($data);

        //send new message to admin for registeration
        $this->sendMessage($create);
        //redirect
        return redirect()->route('register')->with('success', true);
    }


    protected function sendMessage($info)
    {   
        
        $users = User::where('role', 'admin')->get();
        $body = $info->fullname.' '.'به جمع ما پیوست';
        foreach ($users as $user) 
        $data [] = ['title' =>'ثبت نام کاربر جدید','body' =>$body,'sender' => $info->email, 'reciver' => 'admin','status' => 'new','user_id' => $user->id];
        return DB::table('messages')->insert($data);
    }
}
