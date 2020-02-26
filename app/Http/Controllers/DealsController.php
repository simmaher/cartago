<?php

namespace App\Http\Controllers;
use App\Deals;

use Illuminate\Http\Request;

class DealsController extends Controller
{
    public function deals(){
        $deals = Deals::all();
        return $deals;
    }
    public function index()
    { 
        $deals = Deals::all();
        return view('deals.deals')->with('deals',$deals);
    }
    public function show()
    { 
        $deals = Deals::all();
        return view('deals.deals')->with('deals',$deals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $deals = Deals::pluck('id');
       return view('deals.create')->with('deals',$deals);
      
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
            'description'=>'required',
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
        $deals = new Deals;
        $deals->id=$request->input('id');
        $deals->title=$request->input('title');
        $deals->description=$request->input('description');
        $deals->picture=$fileNameToStore;
        $deals->save();
        return redirect('deals');
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
        $deals = Deals::find($id);
       
        $deals->title=$request->input('title');
        $deals->description=$request->input('description');
        $deals->picture=$request->input('picture');
        $deals->save();
        
        return redirect('deals');
        
    }
    public function edit($id)
    {
        $deals = Deals::find($id);
        return view('deals.edit')->with('deals',$deals);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deals = Deals::find($id);
        $deals->delete();
        return redirect('deals')->with('success','Deals supprimer avec succee');
    }

}
