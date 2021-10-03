<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sliders = Slider::all();
        return view('dashboard.slider',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {
        $alt = $data['title'];
        $link = strtok($data['image']->getClientOriginalName(), '.');
        $name = time() . '_' . date('Y') . '.' . $data['image']->getClientOriginalExtension();
        $image = ['alt' => $alt , 'name' => $name, 'text' => $data['text'], 'link' => $link];
        $imageFind = Slider::create($image);
        if ($imageFind) {
            
            $data['image']->move(public_path('uploads'), $name);
            return true;
        }else 
        return false;
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
        
        $data = $this->validateForm($request);
        $sliderCreate = $this->create($data);
        if($sliderCreate)
        {
            return redirect()->back()->with('success',true);
        }
        else
        return redirect()->back()->with('failed',true);
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
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string','max:50'],
            'text' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimes:jpg,png']
        ]);
    }
}
