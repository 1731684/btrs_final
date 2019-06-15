<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Whoweare;

class WhoweareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Whoweare::orderBy('whoweare_id', 'DESC')->paginate(8);
        return view('backend.whoweare.list_whoweare', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.whoweare.create_whoweare');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Whoweare $whoweare)
    {
       $whoweare = new Whoweare;
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('image')) {
            $destination = "img/whoweare";
            $file = $request->image;
            $extension = $file->getClientOriginalName();
            $filename = str_random()."_".$extension;
            $file->move($destination,$filename);
            $data['image']=$filename;
        }

        $data['title'] = $request->title;
        $data['description']= html_entity_decode(strip_tags( $request->description));
        if($whoweare->create($data)){
            return redirect()->route('whoweare')->with('success','The record has been successfully inserted.');
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
        $whoweareId=$request->id;
        $whoweare = Whoweare::where('whoweare_id',$whoweareId)->first();
        return view('backend.whoweare.view_whoweare', compact('whoweare'));
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
        $whoweareId=$request->id;
        $whoweare = Whoweare::where('whoweare_id',$whoweareId)->first();

        return view('backend.whoweare.edit_whoweare', compact('whoweare'));
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
            return redirect()->route('whoweare');
        }
        $whoweareId=$request->id;
        $whoweare = Whoweare::where('whoweare_id',$whoweareId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/whoweare");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $whoweare->image;

        }
        $data['title']=$request->title;
        $data['description']= html_entity_decode(strip_tags( $request->description));
        if(Whoweare::where('whoweare_id',$whoweareId)->update($data)){
          return redirect()->route('whoweare')->with('success','The record was successfully inserted');
        }
        return redirect()->route('whoweare')->with('error','Sorry, the record couldn\'t be updated.');
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
        $whoweareId = $request->id;
        if ( whoweare::where('whoweare_id',$whoweareId)->delete()) {
            return redirect()->route('whoweare')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('whoweare')->with('error','Sorry,the record couldn\'t be deleted');
    }
}
