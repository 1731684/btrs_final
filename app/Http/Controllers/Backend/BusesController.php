<?php

namespace App\Http\Controllers\Backend;

use App\Buses;
use App\Bustypes;
use App\Routes;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusesController extends Controller
{
    public function index()
    {
        $buses = Buses::orderBy('buses_id', 'DESC')->paginate(20);
        return view('backend.bus.list_bus', compact('buses'));
    }


    public function create()
    {

        $bustypes=Bustypes::all();
        $vendors=Vendors::all();
        return view('backend.bus.create_bus',compact('bustypes','vendors'));
    }



    public function saveSeatLayout(Request $request)
    {
        $seat = $request->seatLayout;
        $front=$request->frontLayout;
        $busId=$request->id;
        $data['seat_layout'] = $seat;
        $data['front_layout']=$front;
        if (Buses::where('buses_id',$busId)->update($data)) {
            return redirect()->route('buses')->with('success','Your seat layout is processed successfullly');
        }
        return redirect()->route('buses')->with('error','Sorry your seat layout could not be processed');
    }

    public function showSeatLayout(Request $request)
    {
        $busId=$request->id;
        $data =Buses::where('buses_id', $busId)->first();
        $seat = json_decode($data->seat_layout,true);
        if(is_null($seat)){
            return redirect()->route('buses')->with('error','You must create seat layout first');
        }
        $front=json_decode($data->front_layout,true);
        return view('backend.bus.show_seat_layout', ['seat' => $seat,'busId'=>$busId,'front'=>$front]);
    }

    public function editSeatLayout(Request $request)
    {
        $busId=$request->id;
        $data =Buses::where('buses_id', $busId)->first();
        $seat = json_decode($data->seat_layout,true);
        $front = json_decode($data->front_layout,true);
        $count= isset($request->count)?$request->count:count($seat);
        return view('backend.bus.create_edit_seat_layout', ['seat' => $seat,'busId'=>$busId,'count'=>$count,'front'=>$front]);
    }

    public function createSeatLayout(Request $request)
    {
        $busId=$request->id;
        $count= isset($request->count)?$request->count:49;
        return view('backend.bus.create_edit_seat_layout',['seat'=>null,'busId'=>$busId,'count'=>$count]);
    }




    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $bus= new Buses();
        $this->validate($request,
            [
                'buses_title' => 'required',
            ]);
        $data['buses_title'] = $request->buses_title;
        $data['amenity'] = $request->amenity;
        $data['description'] = $request->description;
        $data['seat_layout'] ='';
        $data['front_layout'] = '';
        $data['billbook_no'] = $request->billbook_no;
        $data['vendors_id'] = $request->vendors_id;
        $data['bustypes_id'] = $request->bustypes_id;
        $data['image'] = $request->image;
        $data['vehicle_no']=$request->vehicle_no;
        $data['driver1']=$request->driver1;
        $data['driver2']=$request->driver2;
        $data['staff1']=$request->staff1;
        $data['staff2']=$request->staff2;
        $data['contact1']=$request->contact1;
        $data['contact2']=$request->contact2;
        $data['contact3']=$request->contact3;
        $data['contact4']=$request->contact4;
        $data['registered_date']=$request->registered_date;
        if($request->hasFile('image')) {
            $destination = public_path("img/bus");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($bus->create($data)){
            return redirect()->route('buses')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('buses')->with('error','Sorry, the record couldn\'t be stored');

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
        $busId=$request->id;
        $bus = Buses::orderBy('buses_id','DESC')->first();
        return view('backend.bus.show_bus', compact('bus'));
    }

    public function view()
    {

        $bus = Buses::orderBy('buses_id','DESC')->paginate(10);
        return view('backend.bus.view_bus', compact('bus'));
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
        $busId=$request->id;
        $bustypes=Bustypes::all();
        $vendors=Vendors::all();
        $bus = Buses::where('buses_id',$busId)->first();
        return view('backend.bus.edit_bus', compact('bus','vendors','bustypes'));
    }


    public function update(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->route('buses');
        }
        $busId=$request->id;
        $this->validate($request,
            [

            ]);
        $data['buses_title'] = $request->buses_title;
        $data['amenity'] = $request->amenity;
        $data['description'] = $request->description;
        $data['seat_layout'] ='';
        $data['front_layout'] = '';
        $data['billbook_no'] = $request->billbook_no;
        $data['vendors_id'] = $request->vendors_id;
        $data['bustypes_id'] = $request->bustypes_id;
        $data['image'] = $request->image;
        $data['vehicle_no']=$request->vehicle_no;
        $data['driver1']=$request->driver1;
        $data['driver2']=$request->driver2;
        $data['staff1']=$request->staff1;
        $data['staff2']=$request->staff2;
        $data['contact1']=$request->contact1;
        $data['contact2']=$request->contact2;
        $data['contact3']=$request->contact3;
        $data['contact4']=$request->contact4;
        $data['registered_date']=$request->registered_date;
        $data['profile']=$request->profile;

        $bus = Buses::where('buses_id',$busId)->first();
        if($request->hasFile('image')) {
            $destination = public_path("img/bus");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }
        else {
            $data['image'] = $bus->image;
        }
        if(Buses::where('buses_id',$busId)->update($data)){
            return redirect()->route('buses')->with('success','The record has been successfully updated');
        }
        return redirect()->route('buses')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $busId = $request->id;
        if ($this->deleteWithImage($busId) && Buses::where('buses_id',$busId)->delete()) {
            return redirect()->route('buses')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('buses')->with('error','Sorry,the record couldn\'t be deleted');

    }


    public function deleteWithImage($id)
    {
        $busId = $id;
        $bus = Buses::where('buses_id',$busId)->first();
        $image = $bus->image;
        $imagePath = public_path('img/bus/' . $image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            return unlink($imagePath);
        }
        return true;
    }

}
