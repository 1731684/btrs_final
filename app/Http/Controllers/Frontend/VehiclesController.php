<?php

namespace App\Http\Controllers\Frontend;

use App\Buses;
use App\Bustypes;
use App\Routes;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    public function saveSeatLayout(Request $request)
    {
        $msg = $request->seatLayout;
        $front=$request->frontLayout;
        $busId=$request->id;
        $data['seat_layout'] = $msg;
        $data['front_layout']=$front;
        if (Buses::where('buses_id',$busId)->update($data)) {
            return redirect()->route('vehiclesVendor')->with('success','Your seat layout is processed successfullly');
        }
        return redirect()->route('vehiclesVendor')->with('error','Sorry your seat layout couldnnot be processed');
    }

    public function showSeatLayout(Request $request)
    {
        $busId=$request->id;
        $data =Buses::where('buses_id', $busId)->first();
        $seat = json_decode($data->seat_layout,true);
        $front=json_decode($data->front_layout,true);
        return view('frontend.vehicle.show_seat_layout', ['seat' => $seat,'busId'=>$busId,'front'=>$front]);
    }

    public function editSeatLayout(Request $request)
    {
        $busId=$request->id;
        $data =Buses::where('buses_id', $busId)->first();
        $seat = json_decode($data->seat_layout,true);
        $front = json_decode($data->front_layout,true);
        $count= isset($request->count)?$request->count:count($seat);
        return view('frontend.vehicle.seat_layout', ['seat' => $seat,'busId'=>$busId,'count'=>$count,'front'=>$front]);
    }

    public function createSeatLayout(Request $request)
    {
        $busId=$request->id;
        $count= isset($request->count)?$request->count:20;
        return view('frontend.vehicle.seat_layout',['seat'=>null,'busId'=>$busId,'count'=>$count]);
    }


    public function index()
    {

        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $buses = Buses::where('vendors_id',$vendorId)->orderBy('buses_id', 'DESC')->paginate(10);
        return view('frontend.vehicle.list_vehicle', compact('buses'));
    }


    public function create()
    {
        $routes=Routes::all();
        $bustypes=Bustypes::all();

        return view('frontend.vehicle.create_vehicle',compact('routes','bustypes'));
    }


    public function store(Request $request)
    {

        if($request->isMethod('get')){
            return redirect()->back();
        }
        $bus= new Buses();
        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $this->validate($request,
            [
                'title' => 'required',
            ]);
        $data['title'] = $request->title;
        $data['billbook_no'] = $request->billbook_no;
        $data['vendors_id'] = $vendorId;
        $data['bustypes_id'] = $request->bustypes_id;
        $data['routes_id'] = $request->routes_id;
        $data['image'] = $request->image;
        $data['vehicle_no']=$request->vehicle_no;
        $data['driver1']=$request->driver1;
        $data['driver2']=$request->driver2;
        $data['staff1']=$request->driver1;
        $data['staff2']=$request->driver2;
        $data['contact1']=$request->contact1;
        $data['contact2']=$request->contact2;
        $data['registered_date']=$request->registered_date;
        $data['status']=$request->status;
        if($request->hasFile('image')) {
            $destination = public_path("img/bus");
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename=str_random().".".$extension;
            $file->move($destination,$filename);
            $data['image'] = $filename;
        }

        if($bus->create($data)){
            return redirect()->route('vehiclesVendor')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('vehiclesVendor')->with('error','Sorry, the record couldn\'t be stored');

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
        $bus = Buses::where('buses_id',$busId)->first();
        return view('frontend.vehicle.view_vehicle', compact('bus'));
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
        $routes=Routes::all();
        $bustypes=Bustypes::all();
        $bus = Buses::where('buses_id',$busId)->first();
        return view('frontend.vehicle.edit_vehicle', compact('bus','routes','bustypes'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('vehiclesVendor');
        }
        $busId=$request->id;
        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $this->validate($request,
            [
                'title' => 'required',
            ]);
        $data['title'] = $request->title;
        $data['billbook_no']=$request->billbook_no;
        $data['vendors_id'] = $vendorId;
        $data['bustypes_id'] = $request->bustypes_id;
        $data['routes_id'] = $request->routes_id;
        $data['image'] = $request->image;
        $data['vehicle_no']=$request->vehicle_no;
        $data['driver1']=$request->driver1;
        $data['driver2']=$request->driver2;
        $data['staff1']=$request->driver1;
        $data['staff2']=$request->driver2;
        $data['contact1']=$request->contact1;
        $data['contact2']=$request->contact2;
        $data['contact3']=$request->contact1;
        $data['contact4']=$request->contact2;
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
            return redirect()->route('vehiclesVendor')->with('success','The record has been successfully updated');
        }
        return redirect()->route('vehiclesVendor')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id) {
            return redirect()->back();
        }
        $busId = $request->id;
        if ($this->deleteWithImage($busId) && Buses::where('buses_id',$busId)->delete()) {
            return redirect()->route('vehiclesVendor')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('vehiclesVendor')->with('error','Sorry,the record couldn\'t be deleted');

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
