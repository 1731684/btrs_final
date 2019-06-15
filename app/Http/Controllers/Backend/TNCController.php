<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TNC;


class TNCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items = TNC::orderBy('tnc_id', 'DESC')->paginate(8);
        return view('backend.tnc.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tnc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tnc = new TNC;
        $this->validate($request,[
            'description'=>'required',
        ]);

        $data['description']= html_entity_decode(strip_tags( $request->description));
        if($tnc->create($data)){
            return redirect()->route('tnc')->with('success','The record has been successfully inserted.');
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
        $tncId=$request->id;
        $tnc = TNC::where('tnc_id',$tncId)->first();
        return view('backend.tnc.show', compact('tnc'));
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
        $tncId=$request->id;
        $tnc = tnc::where('tnc_id',$tncId)->first();

        return view('backend.tnc.edit', compact('tnc'));
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
            return redirect()->route('tnc');
        }
        $tncId=$request->id;
        $tnc = tnc::where('tnc_id',$tncId)->first();
        $data['description']= html_entity_decode(strip_tags( $request->description));
        if(tnc::where('tnc_id',$tncId)->update($data)){
          return redirect()->route('tnc')->with('success','The record was successfully inserted');
        }
        return redirect()->route('tnc')->with('error','Sorry, the record couldn\'t be updated.');
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
        $tncId = $request->id;
        if ( tnc::where('tnc_id',$tncId)->delete()) {
            return redirect()->route('tnc')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('tnc')->with('error','Sorry,the record couldn\'t be deleted');
    }
}
