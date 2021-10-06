<?php

namespace App\Http\Controllers\Front;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vip()
    {   
        $posts = Post::orderByDesc('created_at')->get();
        $vipPosts = Post::where('status','vip')->orderByDesc('created_at')->get();
        return view('front.vip',compact('vipPosts'));
    }

    public function public()
    {   
        $publicPosts = Post::where('status','pub')->orderByDesc('created_at')->get();
        return view('front.public',compact('publicPosts'));
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

        $vipPosts = Post::where('status','vip')->orderByDesc('created_at')->take(4)->get();
        $favPosts = Like::orderByDesc('likes')->take(4)->get();
        $news =  Post::orderByDesc('created_at')->take(4)->get();
        $post = Post::find($id);
        $like  = $post->like;
        //dd($like);
        $comments = $post->comments;
        return view('front.single-blog',compact('post','news','vipPosts','like','comments','favPosts'));
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
}
