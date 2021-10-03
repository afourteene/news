<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->get();
        return view('dashboard.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        $category = ['name' => $data['category']];
        return Category::create($category);
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
        $create = $this->create($data);
        if ($create)
            return redirect()->back()->with('success', true);
        else
            return redirect()->back()->with('failed', true);
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
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Category::find($id);
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
        $validData = $this->validateForm($request);
        
        $data = ['name' => $validData['category']];
        $record = $this->edit($id);
        if ($record and ctype_digit($id)) {
            $record->update($data);
           
            return redirect()->back()->with('success', true);
        } else
            return redirect()->back()->with('failed', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Category::find($id);
        if($record)
        {   
            $record->posts()->detach();
            $record->delete();
            return redirect()->back()->with('success', true);

        }else
        return redirect()->back()->with('failed', true);
    }



    protected function validateForm(Request $request)
    {
        return $request->validate([
            'category' => ['required', 'string', 'max:255']
        ]);
    }
}
