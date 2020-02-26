<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Amenitys;

class AmenityController extends Controller
{
    public function amenity(){
        $amenitys = Amenitys::all();
        return $amenitys;
    }
    public function index()
    { 
        $amenitys = Amenitys::all();
        return view('amenitys.amenitys')->with('amenitys',$amenitys);
    }
    public function show()
    { 
        $amenitys = Amenitys::all();
        return view('amenitys.amenitys')->with('amenitys',$amenitys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $amenitys = Amenitys::pluck('id');
       return view('amenitys.create')->with('amenitys',$amenitys);
      
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'picture'=>'image|nullable|max:10000']);
           if($request->hasFile('picture')){
           $filenameWithExt = $request->file('picture')->getClientOriginalName();
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('picture')->getClientOriginalExtension();
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
           $path = $request->file('picture')->storeAs('public/images', $fileNameToStore);
           } else {
            $fileNameToStore = 'unnamed.jpg';
           }
        $amenitys = new Amenitys;
        $amenitys->id=$request->input('id');
        $amenitys->title=$request->input('title');
        $amenitys->picture=$fileNameToStore;
        $amenitys->save();
        return redirect('amenitys');
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
        $amenitys = Amenitys::find($id);
        $amenitys->title=$request->input('title');
        /*if($request->hasFile('picture')){
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('picture')->storeAs('public/images', $fileNameToStore);*/
            $amenitys->picture= $request->input('picture');
           // }
        $amenitys->update();
        
        return redirect('amenitys')->with('amenitys',$amenitys);
        
    }
    public function edit($id)
    {
        $amenitys = Amenitys::find($id);
        return view('amenitys.edit')->with('amenitys',$amenitys);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenitys = Amenitys::find($id);
        $amenitys->delete();
        return redirect('amenitys')->with('success','amenitys supprimer avec succee');
    }
}
