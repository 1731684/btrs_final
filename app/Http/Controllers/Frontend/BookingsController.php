<?php

namespace App\Http\Controllers\Frontend;

use App\Bookings;
use App\Buses;
use App\Guests;
use App\Travellers;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function index()
    {
        if(!Auth::user() | Auth::user()->user_type!='vendor'){
            return redirect()->route('home');
        }
        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $bookings = DB::table('bookings')
            ->join('buses', 'bookings.buses_id', '=', 'buses.buses_id')
            ->join('guests', 'bookings.guests_id', '=', 'guests.guests_id')
            ->join('travellers', 'bookings.travellers_id', '=', 'travellers.travellers_id')
            ->select('bookings.*', 'buses.*','travellers.email as travellers_email','guests.contact as contact')
            ->where([
                ['buses.vendors_id',$vendorId]
            ])
            ->orderBy('bookings_id','DESC')
            ->paginate(8);
        return view('frontend.booking.list_booking', compact('bookings'));
    }


    public function create()
    {
        if(!Auth::user() | Auth::user()->user_type!='vendor'){
            return redirect()->route('home');
        }
        $vendor=Vendors::where('email',Auth::user()->email)->first();
        $vendorId=$vendor->vendors_id;
        $buses=Buses::where('vendors_id',$vendorId)->get();
        return view('frontend.booking.create_booking',compact('buses'));
    }

    public function store(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->back();
        }

        $booking = new Bookings();
        $guest= new Guests();
        $this->validate($request,[
            'buses_id'=>'required',
            'seat'=>'required',
            'price'=>'required',
            'profile'=>'required'
        ]);
        $guest->contact=$request->contact;
        $guest->name=$request->name;
        $data['buses_id']=$request->buses_id;
        $data['price']=$request->price;
        $data['profile']=$request->profile;
        $data['seat']=$request->seat;
        if($guest->save()) {
            $data['guests_id']=$guest->guests_id;
            $data['travellers_id']=1;
            if ($booking->create($data)) {
                return redirect()->route('bookingsVendor')->with('success', 'The record has been successfully inserted.');
            }
            return redirect()->route('bookingsVendor')->with('error', 'Sorry, the record couldn\'t be stored');
        }
    }


    public function show(Request $request)
    {
        if(!$request->id){
            return redirect()->back();
        }
        $bookingId=$request->id;
        $booking = Bookings::where('bookings_id',$bookingId)->first();
        return view('frontend.booking.view_booking', compact('booking'));
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
        $bookingId=$request->id;
        $buses=Buses::all();
        $guests=Guests::all();
        $travellers=Travellers::all();
        $booking = Bookings::where('bookings_id',$bookingId)->first();

        return view('frontend.booking.edit_booking', compact('booking','buses','guests','travellers'));
    }


    public function update(Request $request)
    {
        if($request->isMethod('get')){
            return redirect()->route('bookingsVendor');
        }
        $bookingId=$request->id;
        $data['travellers_id']=isset($request->travellers_id)? $request->travellers_id:0;
        $data['guests_id']=isset($request->guests_id)?$request->guests_id:0;
        $data['buses_id']=$request->buses_id;
        $data['price']=$request->price;
        $data['profile']=$request->profile;
        $data['seat']=$request->seat;
        if(Bookings::where('bookings_id',$bookingId)->update($data)){
            return redirect()->route('bookingsVendor')->with('success','The record has been successfully inserted');
        }
        return redirect()->route('bookingsVendor')->with('error','Sorry, the record couldn\'t be updated.');
    }

    public function destroy(Request $request)
    {
        if (!$request->id | $request->isMethod('get')) {
            return redirect()->back();
        }
        $bookingId = $request->id;
        if ( Bookings::where('bookings_id',$bookingId)->delete()) {
            return redirect()->route('bookingsVendor')->with('success', 'The record was successfully deleted');
        }
        return redirect()->route('bookingsVendor')->with('error','Sorry,the record couldn\'t be deleted');


    }

}
