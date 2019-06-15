<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendSms(Request $request)
        {
            //$busName = Bookings::where('schedules_id', $schedules_id,
            $to = '+94778135468';
           // dd($request);
            $schedules_id = $request->schedules_id;
            $buses_id = $request->buses_id;
            //$routes_id = $schedules_id->routes_id;
            $seat = $request->seat;
            $busDetails = Schedules::where('schedules_id', $schedules_id)->first();
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
            $data6['buses_title'] = $busDetails->boarding_points;
            $data = implode(',', $data);
            $data1 = implode(',', $data1);
            $data2 = implode(',', $data2);
            $data3 = implode(',', $data3);
            $data4 = implode(',', $seat);
            $data5 = implode(',', $data5);
            $data6 = implode(',', $data6);
           // $busName = $busName->buses_title;
            //dd($data5);
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
                     'from' => '+15092071880',
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
}
