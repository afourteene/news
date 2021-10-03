<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $profileImage = $user->image;
        //dd($profileImage);
        return view('dashboard.information', compact('user', 'profileImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role === 'admin' or Auth::user()->id === $id) {
            //validate 
            
            $form = $this->validateForm($request);
            $data = [
                'fullname' => $form['fullname'],
                'email' => $form['email'],
                'role' => array_key_exists('user', $form) ? $form['user'] : Auth::user()->role,
                'password' => Hash::make($form['password']),
            ];
            $user = User::find($id);
            $this->profileImage($form['image'], $user->id);
            $user->update($data);
            return redirect()->back()->with('success',true);
        }else
        return redirect()->back()->with('failed',true);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function profileImage($data, $userId): bool
    {
        
        $name = strtok($data->getClientOriginalName(), '.');
        $url = time() . '_' . date('Y') . '.' . $data->getClientOriginalExtension();
        $image = ['name' => $name, 'url' => $url, 'imageable_id' => $userId, 'imageable_type' => User::class];
        //dd($image);
        $create = Image::updateOrCreate($image);
        if ($create) {
            $data->move(public_path('uploads'), $url);
            return true;
        } else
            return false;
    }

    protected function validateForm(Request $request)
    {
        return $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'user' => ['string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required', 'mimes:jpg,png']
        ]);
    }
}
