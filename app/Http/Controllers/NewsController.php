<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function news(){
        $news = News::all();
        return $news;
    }

    public function index()
    { 
        $news = News::all();
        return view('news.news')->with('news',$news);
    }
    public function show()
    { 
        $news = News::all();
        return view('news.news')->with('news',$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $news = News::pluck('id');
       return view('news.create')->with('news',$news);
      
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
        $news = new News;
        $news->id=$request->input('id');
        $news->title=$request->input('title');
        $news->description=$request->input('description');
        $news->picture=$fileNameToStore;
        $news->save();
        return redirect('news');
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
        $news = News::find($id);
       
        $news->title=$request->input('title');
        $news->description=$request->input('description');
        $news->picture=$request->input('picture');
        $news->save();
        
        return redirect('news');
        
    }
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit')->with('news',$news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('news')->with('success','New supprimer avec succee');
    }
}
