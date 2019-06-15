<?php

namespace App\Http\Controllers\Backend;

use App\Buses;
use App\Cities;
use App\Routes;
use App\Guests;
use App\Schedules;
use App\Travellers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class SchedulesController extends Controller
{
    public function ajaxFetch(){

            $id = $_POST['id'];
            $test = Routes::where('routes_id',$id)->first();
             $cities=$test->destination;
             $data= explode(',',$cities);
            echo json_encode($data);
    }

    public function saveSchedulePrice(Request $request)
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

    public function showSchedulePrice(Request $request)
    {
        $scheduleId=$request->id;
        $data =Schedules::where('schedules_id', $scheduleId)->first();
        $price = $data->ticket_price;
        if(is_null($price)){
            return redirect()->route('schedules')->with('error','You must create price range first');
        }
        return view('backend.schedule.show_schedule_price', ['price'=>$price,'schedulesId'=>$scheduleId]);
    }

    public function editSchedulePrice(Request $request)
    {
        $scheduleId=$request->id;
        $data =Schedules::where('schedules_id', $scheduleId)->first();
        $price = $data->ticeket_price;
        return view('backend.schedule.edit_schedule_price', ['scheduleId'=>$scheduleId,'price'=>$price]);
    }

    public function createSchedulePrice(Request $request)
    {   $buses=Buses::all();
        $routes = Routes::all();
        $destinations=Cities::all();
        
        $scheduleId=$request->id;

        //dd($buses);
        $schedule =Schedules::where('schedules_id', $scheduleId)->first();
        $dropping_points=explode(",", $schedule->dropping_points);
        $boarding_points=explode(",", $schedule->boarding_points);
        return view('backend.schedule.create_schedule_price', ['scheduleId'=>$scheduleId],compact('buses','routes','destinations'));
    }


    public function index()
    {
        $schedules =Schedules::orderBy('schedules_id', 'DESC')->paginate(8);
        return view('backend.schedule.list_schedule', compact('schedules'));
    }


    public function create()
    {
        $buses=Buses::all();
        $routes = Routes::all();
        $destinations=Cities::all();
        return view('backend.schedule.create_schedule',compact('buses','routes','destinations'));
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
        ]);

        $data['buses_id']=$request->buses_id;
        $data['departure_date']=$request->departure_date;
        $data['departure_time']=$request->departure_time;
        $data['arrival_date']=$request->arrival_date;
        $data['arrival_time']=$request->arrival_time;
        $data['routes_id']= $request->routes_id;
        if(!empty($request->dropping_points)){
            $data['dropping_points']= implode(",", $request->dropping_points);
        }
       if(!empty($request->boarding_points)){
           $data['boarding_points'] = implode(",", $request->boarding_points);
        }

        $data['shift']=$request->shift;
        //$data['boarding'] = implode(",", $request->boarding);

        if($schedule->create($data)){

            return redirect()->route('schedules')->with('success','The record has been successfully inserted.');
        }
        return redirect()->route('schedules')->with('error','Sorry, the record couldn\'t be stored');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(request $request )
    {
//        if(!$request->id){
//           return redirect()->back();
//        }
       $scheduleId=$request->id;
        $schedule = Schedules::orderBy('schedules_id','DESC')->paginate(8);
        return view('backend.schedule.view_schedule', compact('schedule'));
    }

    public function show(Request $request )
    {
        if(!$request->id){
            return redirect()->back();
        }
        $scheduleId=$request->id;
        $routes = Routes::all();
        $schedule = Schedules::where('schedules_id',$scheduleId)->first();
        return view('backend.schedule.show_schedule', compact('schedule','routes'));
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
        $scheduleId=$request->id;
        $buses=Buses::all();
        $routes = Routes::all();
        $schedule = Schedules::where('schedules_id',$scheduleId)->first();
        return view('backend.schedule.edit_schedule', compact('schedule','buses','routes'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();
        }

        $scheduleId = $request->id;
        $this->validate($request,[
            'departure_date'=>'required',
            'departure_time'=>'required',
            'shift'=>'required',
        ]);

        $data['buses_id']=$request->buses_id;
        $data['departure_date']=$request->departure_date;
        $data['departure_time']=$request->departure_time;
        $data['arrival_date']=$request->arrival_date;
        $data['arrival_time']=$request->arrival_time;
        $data['routes_id']= $request->routes_id;
        if(!empty($request->dropping_points)){
            $data['dropping_points']= implode(",", $request->dropping_points);
        }
        if(!empty($request->boarding_points)){
            $data['boarding_points'] = implode(",", $request->boarding_points);
        }

        $data['shift']=$request->shift;

        if(Schedules::where('schedules_id',$scheduleId)->update($data)){
            return redirect()->route('schedules')->with('success','The record has been successfully inserted');
        }
        return redirect()->route('schedules')->with('error','Sorry, the record couldn\'t be updated.');

    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $scheduleId = $request->id;
        if ( Schedules::where('schedules_id',$scheduleId)->delete()) {
            return redirect()->route('schedules')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('schedules')->with('error','Sorry,the record couldn\'t be deleted');


    }

}
