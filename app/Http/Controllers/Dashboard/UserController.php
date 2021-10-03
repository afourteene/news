<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role','author')->orWhere('role','support')->get();
        return view('dashboard.users',compact('users'));
    }


    public function show($id)
    {
        $user = User::find($id);
        $profileImage = $user->image;
        //dd($profileImage);
        return view('dashboard.information', compact('user', 'profileImage'));
    }



    public function destroy($id)
    {
        $delete = User::destroy($id);
        if($delete)
        return redirect()->route('users')->with('success',true);
        else 
        return redirect()->route('users')->with('failed',true);
        

    }
}
