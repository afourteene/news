<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();
        return view('dashboard.post', compact('posts'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validateForm($request);
        $post = [
            'title' => $data['title'],
            'body' => $data['body'],
            'status' =>$data['post-type'],
            'user_id' => Auth::user()->id,
        ];
        //dd($post );

        $create = Post::create($post);
        if ($create) {
            $create->categories()->attach($data['categories']);
            $this->tagCreate($create->id, $this->stringToArray($data['tags']));
            $this->postImage($create->id,$data);
            return redirect()->route('posts')->with('success', true);
        } else
            return redirect()->route('posts')->with('failed', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = $post->categories()->get();
        $tags = $post->tags()->get();
        foreach( $post->tags()->get() as $tag)
        $arrayTags[] = $tag->name; 

        $stringTags = implode(',',$arrayTags);
        
        return view('dashboard.update-post',compact('post','categories','stringTags'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Post::find($id);
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
        $editPost = $this->edit($id);
        $imageId = $editPost->image->id;
        
       // dd($imageId);        

        $data = $this->validateForm($request);
        $post = [
            'title' => $data['title'],
            'body' => $data['body'],
            'status' =>$data['post-type'],
            'user_id' => 1,
        ];
        
        if ( $editPost ) {
            $editPost->update($post);
            $editPost->categories()->sync($data['categories']);
            //$this->tagCreate($editPost->id, $this->stringToArray($data['tags']));
            $this->postImageUpdate( $editPost->id, $imageId  ,$data);
            return redirect()->route('posts')->with('success', true);
        } else
            return redirect()->route('posts')->with('failed', true);
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post->categories()->detach();
            $post->delete();
            return redirect()->back()->with('success', true);
        }
        else{
            return redirect()->back()->with('failed', true);
        }
    }


    protected function validateForm(Request $request)
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'post-type' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'string'],
            'categories' => ['required', 'array'],
            'image' => ['required', 'mimes:jpg,png']
        ]);
    }


    protected function stringToArray($string, $separator = NULL): array
    {

        $signSeperator = is_null($separator) ? ',' : $separator;
        return explode($signSeperator, $string);
    }


    private function tagCreate(int $postId, array $tags): bool
    {
        foreach ($tags as $tag) {
            $data[] = ['name' => $tag, 'post_id' => $postId];
        }

        return DB::table('tags')->insert($data);;
    }

    private function postImage($postId, $data): bool
    {
    
        $name = strtok($data['image']->getClientOriginalName(), '.');
        $url = time() . '_' . date('Y') . '.' . $data['image']->getClientOriginalExtension();
        $image = ['name' => $name, 'url' => $url, 'imageable_id' => $postId, 'imageable_type' => Post::class];
        $create = Image::create($image);
        if ($create) {
            $data['image']->move(public_path('uploads'), $url);
            return true;
        }else 
        return false;
    }
    private function postImageUpdate($postId,$imageId, $data): bool
    {
        
        $name = strtok($data['image']->getClientOriginalName(), '.');
        $url = time() . '_' . date('Y') . '.' . $data['image']->getClientOriginalExtension();
        $image = ['name' => $name, 'url' => $url, 'imageable_id' => $postId, 'imageable_type' => Post::class];
        $imageFind = Image::find($imageId);
        if ($imageFind) {
            
            $imageFind->update($image);
            $data['image']->move(public_path('uploads'), $url);
            return true;
        }else 
        return false;
    }
    
}
