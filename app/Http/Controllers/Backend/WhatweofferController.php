<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Whatweoffer;

class WhatweofferController extends Controller
{
    /**
     * Display a listing of the resource.
     * /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items = Whatweoffer::orderBy('whatweoffer_id', 'DESC')->paginate(8);
        return view('backend.whatweoffer.list_whatweoffer', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.whatweoffer.create_whatweoffer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $whatweoffer = new Whatweoffer;
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('image')) {
            $destination = "img/whatweoffer";
            $file = $request->image;
            $extension = $file->getClientOriginalName();
            $filename = str_random()."_".$extension;
            $file->move($destination,$filename);
            $data['image']=$filename;
        }

        $data['title'] = $request->title;
        $data['description']=  $request->description;
        if($whatweoffer->create($data)){
            return redirect()->route('whatweoffer')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('create')->with('error','Sorry, the record couldn\'t be stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $whatweofferId=$request->id;
        $whatweoffer = Whatweoffer::where('whatweoffer_id',$whatweofferId)->first();
        return view('backend.whatweoffer.view_whatweoffer', compact('whatweoffer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $whatweofferId=$request->id;
        $whatweoffer = Whatweoffer::where('whatweoffer_id',$whatweofferId)->first();

        return view('backend.whatweoffer.edit_whatweoffer', compact('whatweoffer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         if($request->isMethod('get')){
            return redirect()->route('whatweoffer');
        }
        $whatweofferId=$request->id;
        $whatweoffer = Whatweoffer::where('whatweoffer_id',$whatweofferId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/whatweoffer");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $whatweoffer->image;

        }
        $data['title']=$request->title;
        $data['description']=  $request->description;
        if(Whatweoffer::where('whatweoffer_id',$whatweofferId)->update($data)){
          return redirect()->route('whatweoffer')->with('success','The record was successfully inserted');
        }
        return redirect()->route('whatweoffer')->with('error','Sorry, the record couldn\'t be updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $whatweofferId = $request->id;
        if ( Whatweoffer::where('whatweoffer_id',$whatweofferId)->delete()) {
            return redirect()->route('whatweoffer')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('whatweoffer')->with('error','Sorry,the record couldn\'t be deleted');
    }
}
