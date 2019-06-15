<?php

namespace App\Http\Controllers\Frontend;

use App\Buses;
use App\Guests;
use App\Schedules;
use App\Travellers;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
{
    public function index()
    {

        if(!Auth::user() | Auth::user()->user_type!='vendor'){
            return redirect()->route('home');
        }
        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $schedules = DB::table('schedules')
            ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
            ->select('schedules.*', 'buses.*')
            ->where([
                ['buses.vendors_id',$vendorId]
            ])
            ->orderBy('schedules_id','DESC')
            ->paginate(6);
        return view('frontend.schedule.list_schedule', compact('schedules'));
    }

    public function create()
    {
        if(!Auth::user() | Auth::user()->user_type!='vendor'){
            return redirect()->route('home');
        }
        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $buses=Buses::where('vendors_id',$vendorId)->get();
        return view('frontend.schedule.create_schedule',compact('buses'));
    }

    public function store(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();
        }

        $schedule = new Schedules();
        $this->validate($request,[
            'departure_date'=>'required',
            'departure_time'=>'required',
            'shift'=>'required',
            'ticket_price'=>'required|numeric'
        ]);
        $data['buses_id']=$request->buses_id;
        $data['departure_date']=$request->departure_date;
        $data['departure_time']=$request->departure_time;
        $data['arrival_date']=$request->arrival_date;
        $data['arrival_time']=$request->arrival_time;
        $data['ticket_price']=$request->ticket_price;
        $data['shift']=$request->shift;
        if($schedule->create($data)){
            return redirect()->route('schedulesVendor')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('schedulesVendor')->with('error','Sorry, the record couldn\'t be stored');
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
        $scheduleId=$request->id;
        $schedule = Schedules::where('schedules_id',$scheduleId)->first();
        return view('frontend.schedule.view_schedule', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(!Auth::user() | Auth::user()->user_type!='vendor'){
            return redirect()->route('home');
        }
        if(!$request->id){
            return redirect()->back();
        }
        $scheduleId=$request->id;

        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $buses=Buses::where('vendors_id',$vendorId)->get();
        $schedule = Schedules::where('schedules_id',$scheduleId)->first();
        return view('frontend.schedule.edit_schedule', compact('schedule','buses'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();
        }
        $scheduleId=$request->id;
        $data['buses_id']=$request['buses_id'];
        $data['departure_date']=$request['departure_date'];
        $data['departure_time']=$request['departure_time'];
        $data['arrival_date']=$request['arrival_date'];
        $data['arrival_time']=$request['arrival_time'];
        $data['ticket_price']=$request['ticket_price'];
        $data['shift']=$request['shift'];
        if(Schedules::where('schedules_id',$scheduleId)->update($data)){
            return redirect()->route('schedulesVendor')->with('success','The record has been successfully updated');
        }
        return redirect()->route('schedulesVendor')->with('error','Sorry, the record couldn\'t be updated.');
    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $scheduleId = $request->id;
        if ( Schedules::where('schedules_id',$scheduleId)->delete()) {
            return redirect()->route('schedulesVendor')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('schedulesVendor')->with('error','Sorry,the record couldn\'t be deleted');
    }
}
