<?php

namespace App\Http\Controllers\Front;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {   
        return Comment::create($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $validateData = $this->validateForm($request);
        //dd($request->ip());
        $data = ['author' => $validateData['fullname'] ,'email' => $validateData['email'], 'author_ip' => $request->ip() ,'post_id'=>$id , 'comment' => $validateData['comment'] ];
        $create = $this->create($data);
        return redirect()->back()->with('success',true);
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
        //
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


    protected function validateForm(Request $request)
    {
        return $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','email'],
            'comment' => ['required', 'string', 'max:255']
        ]);
    }
}
