<?php

namespace App\Http\Controllers\Backend;

use App\Cities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::orderBy('cities_id', 'DESC')->paginate(8);
        return view('backend.city.list_city', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.city.create_city');
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $city = new Cities();
        $this->validate($request,[
            'cities_title'=>'required',
        ]);
        $data['cities_title']=$request->cities_title;
       $data['profile']='verified';
        if($city->create($data)){
            return redirect()->route('cities')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('cities')->with('error','Sorry, the record couldn\'t be stored');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        // if(!$request->id){
        //     return redirect()->back();
        // }
        // $cityId=$request->id;
        $city = Cities::orderBy('cities_id','DESC')->paginate(8);

        return view('backend.city.view_city', compact('city'));
    }

    public function show(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $cityId=$request->id;
        $city = Cities::where('cities_id',$cityId)->first();
        return view('backend.city.show_city', compact('city'));
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
        $cityId=$request->id;
        $city = Cities::where('cities_id',$cityId)->first();
        return view('backend.city.edit_city', compact('city'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('cities');
        }
        $cityId=$request->id;
       
        $this->validate($request,[

        ]);
        $data['cities_title']=$request->cities_title;
       
        if(Cities::where('cities_id',$cityId)->update($data)){
            return redirect()->route('cities')->with('success','The record has been successfully updated');
        }
        return redirect()->route('cities')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $cityId = $request->id;
        if ( Cities::where('cities_id',$cityId)->delete()) {
            return redirect()->route('cities')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('cities')->with('error','Sorry,the record couldn\'t be deleted');


    }

}
