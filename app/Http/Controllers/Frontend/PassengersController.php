<?php

namespace App\Http\Controllers\Frontend;

use App\Bookings;
use App\Bookingsinfo;
use App\Buses;
use App\Passengers;
use App\Schedules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonials;
use App\Whoweare;
use App\Whatweoffer;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class PassengersController extends Controller
{
    public function booking(Request $request)
    {

        /*
        $buses_id = $request->buses_id;
            //$originalDate = $date;
            //$newDate = date("d-m-Y", strtotime($originalDate));
            $bookingSeat = DB::table('bookings')
            ->select("bookings.schedules_id","bookings.schedules_id",DB::raw("(GROUP_CONCAT(bookings.seat SEPARATOR ',')) as `seat`"))
            
            //->where('',$routes_id)
            ->where('buses_id',$buses_id)
            //$this->db->where('booking_date',$newDate);
            //->where('profile','pending')
            ->groupBy('bookings.schedules_id')
            ->get();
           // $query  = $this->db->get($table);  //--- Table name = User
            //$bookingSeat = $query->result_array(); 
            //return $bookingSeat; 



        */

        //river is used to pass important params with flow of it from page to page
       /* $seat = $request->seat;
        $buses_id = $request->buses_id;
        $schedules_id = $request->schedules_id;
        $data = Buses::where('buses_id', $buses_id)->first();
        $seat = json_decode($data->seat_layout, true);
        $front = json_decode($data->front_layout, true);


       // $bookingSeat = Bookings::select('seat')->get()->toarray();


        $bookingSeat = Bookings::where('schedules_id', $schedules_id)->get();
        //$bookingSeat = $bookingSeat->seat;
       // $bookingSeat = explode(',', $bookingSeat);

       // $profileTypes = ['pending'];
     /*  Bookings->where([
      ['schedules_id', '=', 'schedules_id'],
      ['profile', '=', 'pending']
]);*/
       //$bookingSeat  = Bookings::where('schedules_id', $schedules_id,
        //DB::raw("(GROUP_CONCAT(bookings.seat SEPARATOR ',')) as `seat`"))
       // ->where('profile', 'pending')
        //->where('buses_id', $buses_id)
        //->where('seat')
        //->get();

       /*$bookingSeat = DB::table('bookings')
            ->select('bookings.schedules_id','bookings.schedules_id'
            ,DB::raw("(GROUP_CONCAT(bookings.seat SEPARATOR ',')) as `seat`"))
            

            //->leftjoin("bookings","bookings.buses_id","=","bookings.id")
            ->groupBy('bookings.schedules_id')
            ->get();
        $bookingSeat = json_encode($bookingSeat->seat, true);
        */   

        
  /*      $bookingSeat = $bookingSeat->map(function($bookSeat) {
        $bookSeat->seat = explode(",", $bookSeat->seat);

        return $bookSeat;

});*/
/*
 // printf($bookingSeat);
  //exit();     
$bookingSeat[]='';
 @foreach($bookingSeat as $seer){
$bookingSeat[$seer->seat]=$seer;
 }
 

        return view('frontend.booking',compact('bookingSeat'), ['seat' => $seat, 'buses_id' => $buses_id, 'schedules_id' => $schedules_id, 'front' => $front, 'bookingSeet'=>$bookingSeat, ]);
*/
        $seat         = $request->seat;
        $buses_id     = $request->buses_id;
        $schedules_id = $request->schedules_id;
        $data         = Buses::where('buses_id', $buses_id)->first();
        $seat         = json_decode($data->seat_layout, true);
        $front        = json_decode($data->front_layout, true);
        $bookingSeat  = Bookings::where('schedules_id', $schedules_id)->get();

                /*$bookingSeat = $bookingSeat->map(function ($bookSeat) {
                    $bookSeat->seat = explode(",", $bookSeat->seat);
                    return $bookSeat;
                });*/

                   // $bookingSeets=[];

            if(!empty($bookingSeat)){
                //dd($bookingSeat);
                 foreach($bookingSeat as $seer){
                  $bookingSeets[$seer->seat]=$seer;
                  //dd($seer);
                 }
              }
         // dd($bookingSeets);       

        return view('frontend.booking', ['seat' => $seat, 'buses_id' => $buses_id, 'schedules_id' => $schedules_id, 'front' => $front, 'bookingSeet' => $bookingSeat,'bookingSeets'=>$bookingSeets]);

    }

    public function collectInformation(Request $request)
    { 
        // for testing
        // $seat_no = [1, 2, 3];
        // $busId = 1;
        $buses_id = $request->buses_id;
        $schedules_id = $request->schedules_id;

        //$routes = Bookings::where('routes_id',4)->first();
        //$routes = $routes->routes_id;
        $routetitle = DB::table('routes')
        ->where('routes_title','Colombo - Jaffna')
        ->first(); 
        $routetitle = $routetitle->routes_title;


        $seat_no = $request->seat_id;
        $data = Buses::where('buses_id', $buses_id)->first();
        $seat = json_decode($data->seat_layout, true);
        $count = count($seat_no);
        for ($i = 0; $i < $count; $i++) {
            $first = array_shift($seat_no);
            $name = !empty($seat[$first]['name']) ? $seat[$first]['name'] : $seat_no;
            $seat_data[$i] = [
                'name' => $name,
                'id' => $seat_no,
            ];
        }

        return view('frontend.passenger', ['buses_id' => $buses_id, 'schedules_id' => $schedules_id, 'seat_data' => $seat_data, 'routetitle' => $routetitle]);
    }

     public function sendSms(Request $request)
        {
            //$busName = Bookings::where('schedules_id', $schedules_id,
            $to = '+94778135468';
            //$to = '+94778514083';

            $schedules_id = $request->schedules_id;
            $buses_id = $request->buses_id;
            //$routes_id = $schedules_id->routes_id;
            $seat = $request->seat;
            $boarding_point = $request->boarding_point;

            $busDetails = Schedules::where('schedules_id', $schedules_id)->first();
            $boarding_point = Bookings::where('boarding_point',$boarding_point)->first();
            
            $routes_id = $busDetails->routes_id;
            $busRoute = DB::table('routes')
            ->where('routes_id',$routes_id)
            ->first();
            $busName = Buses::where('buses_id', $buses_id)->first();
            $data['buses_title'] = $busName->buses_title;
            $data1['buses_title'] = $busDetails->departure_date;
            $data2['buses_title'] = $busDetails->departure_time;
            $data3['buses_title'] = $busRoute->routes_title;
            $data5['buses_title'] = $busDetails->ticket_price;
            $data6['buses_title'] = $boarding_point->boarding_point;
            
            $data = implode(',', $data);
            $data1 = implode(',', $data1);
            $data2 = implode(',', $data2);
            $data3 = implode(',', $data3);
            $data4 = implode(',', $seat);
            $data5 = implode(',', $data5);
            $data6 = implode(',', $data6);
           // $busName = $busName->buses_title;

            $messagess = $data3."\n".$data."\n".$data1."\n".$data6."\nSeat No : ".$data4."\nLKR ".$data5.".00"."\nTel : 0778514083"."\n1 luggage & bag only " ;
        
            $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
            $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
            $appSid     = config('app.twilio')['TWILIO_APP_SID'];
            $client = new Client($accountSid, $authToken);
            try
            {
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
            // the number you'd like to send the message to
                $to,
           array(
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '+12055263148',
                 // the body of the text message you'd like to send
                 'body' => $messagess
                 
             )
         );
   }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
        return view('frontend.index');
        }

    public function storeInformation(Request $request)
    {
        // Booking info validation
        //        $this->validate($request,[
        //            'name'=>'required',
        //            'contact'=>'required',
        //            'address'=>'required',
        //            'gender'=>'required'
        //        ]);

        $buses_id = $request->buses_id;
        $schedules_id = $request->schedules_id;
        $schedule = Schedules::where('schedules_id', $schedules_id)->first();
        $routes_id = $schedule->routes_id;


        //array of passenger and seat info
        $seat_data = json_decode($request->seat_data, true);
        $name = $request->name;
        $count = count($name);
        $gender = $request->gender;
        $age = $request->age;
        $seat = $request->seat;


        $booking = new Bookings();
        $booking->users_id = 4;
        $booking->schedules_id = $schedules_id;
        $booking->buses_id = $buses_id;
        $booking->routes_id = $routes_id;
        $booking->seat = implode(',', $seat);
        $booking->price = $schedule->ticket_price;
        $booking->profile = 'confirmed';
        $booking->contact = $request->booker_contact;
        $booking->user_name = $request->booker_name;
        $booking->boarding_point = $request->boarding_point;
        //$this->sendSms();



        /* $extSeat = DB::table('bookings')->select('seat')->first();
        $extSeat = explode(",", $extSeat->seat);
        $booking = Bookings::updateOrCreate(
           ['schedules_id' => $schedules_id],// row to test if schedule id matches existing schedule id
           [ // update this columns
              'buses_id' => $buses_id,
              'routes_id' => $routes_id,
              'seat' => implode(",", array_merge($seat,$extSeat )),
              'price' => $request->price,
              'profile' => 'pending',
           ]);*/


        if ($booking->save()) {
            //booking info post data
            $bookingsinfo = new Bookingsinfo();
            $data['name'] = $request->booker_name;
            $data['contact'] = $request->booker_contact;
            $data['address'] = $request->booker_address;
            $data['gender'] = $request->booker_gender;
            $data['schedules_id'] = $schedules_id;
            $data['buses_id'] = $buses_id;
            $data['routes_id'] = $routes_id;
            $data['bookings_id'] = $booking->bookings_id;
            $data['whoweare'] = Whoweare::all();
            $data['whatweoffer'] = Whatweoffer::all();
            $data['testimonials'] = Testimonials::all();
            if ($bookingsinfo->create($data)) {
                for ($key = 0; $key < $count; $key++) {
                    $data['name'] = $name[$key];
                    $data['age'] = $age[$key];
                    $data['gender'] = $gender[$key];
                    $data['seat'] = $seat[$key];
                    $data['schedules_id'] = $schedules_id;
                    $data['routes_id'] = $routes_id;
                    $data['bookings_id'] = $booking->bookings_id;
                    $data['buses_id'] = $buses_id;
                    if (Passengers::create($data)) {

                    } else {
                        echo "<script>alert('currently service is down');</script>";
                    }
                }
            }
            
            echo "<script>alert('Booking Successful!');</script>";
            return $this->sendSms($request);

            return view('frontend.index')->with($data);
        }


    }

}


