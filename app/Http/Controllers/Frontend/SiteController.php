<?php

namespace App\Http\Controllers\Frontend;

use App\Buses;
use App\Bustypes;
use App\FAQ;
use App\Routes;
use App\Schedules;
use App\TNC;
use App\Travellers;
use App\Users;
use App\Vendors;
use App\Testimonials;
use App\Whoweare;
use App\Whatweoffer;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class SiteController extends Controller
{

//data contains 'results', 'from', 'to', 'count', 'bustypes', 'departure_date', 'arrival_date', 'seat', 'bustype', 'shift', 'price';
    protected $search_schedules = [];
    protected $data = [];

    public function index()
    {
        $data['whoweare'] = Whoweare::all();
        $data['whatweoffer'] = Whatweoffer::all();
        $data['testimonials'] = Testimonials::all();
        return view('frontend.index')->with($data);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function faq()
    {
        $data['faq'] = FAQ::all();
        return view('frontend.faq')->with($data);
    }

    public function tnc()
    {
        $data['tnc'] = TNC::all();
        return view('frontend.tnc')->with($data);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function search(Request $request)
    {
        if (!isset($request->from) && !isset($request->to) && !isset($request->departure_date) ) {
            return redirect()->back();
        }
        //for checkbox to be selected incase filter appllied
        $data['bustype'] = isset($request->bustype) ? $request->bustype : '';
        $data['shift'] = isset($request->shift) ? $request->shift : '';
        $data['price'] = isset($request->price) ? $request->price : '';
        $data['results_id']=isset($request->results_id)?$request->results_id:'';

        //catching data from user input to display search routes
        $data['to'] = $request->to;
        $data['from'] = $request->from;
        $data['route'] = $data['from'] . "-" . $data['to'];
        $data['departure_date'] = isset($request->departure_date) ? $request->departure_date : date('Y/m/d');
        $data['arrival_date'] = $request->arrival_date;
        $data['seat'] = $request->seat;
        $schedules=Schedules::where('departure_date','=',$request->departure_date)->get();
        //$schedules = Schedules::all();
        foreach ($schedules as $key => $schedule) {
            $destination = $schedule->routes->destination;
            $destination = explode(',', $destination);
            $count = count($destination);
            for ($i = 0; $i < $count; $i++) {
                if ($data['from'] == $destination[$i]) {
                    for ($j = ++$i; $j < $count; $j++) {
                        if ($data['to'] == $destination[$j]) {
                            $this->search_schedules[] = $schedule->schedules_id;
                            break;
                        }
                    }
                }
            }
        }

        $data['results'] = DB::table('schedules')
            ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
            ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
            ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
            ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
            ->whereIn(
                'schedules_id', $this->search_schedules
            )
            ->get();
        $data['count'] = count($data['results'], COUNT_RECURSIVE);
        $data['bustypes'] = Bustypes::all();
        $data['results_id']=implode(',',$this->search_schedules);
        $this->data = $data;
        //data contains 'results', 'from', 'to', 'count', 'bustypes', 'departure_date', 'arrival_date', 'seat', 'bustype', 'shift', 'price';
        return view('frontend.searches')->with($data);
    }

    public function searchFilter(Request $request)
    {
        if (!isset($request->shift) && !isset($request->bustype) && !isset($request->price)) {
            return redirect()->back();
        }
        //for checkbox to be selected incase filter appllied
        $this->data['bustype'] = isset($request->bustype) ? $request->bustype : '';
        $this->data['shift'] = isset($request->shift) ? $request->shift : '';
        $this->data['price'] = isset($request->price) ? $request->price : '';

        //catching from data of hidden inputs
       $this->data['to'] = $request->to;
        $this->data['from'] = $request->from;
        $this->data['route'] = $this->data['from'] . "-" . $this->data['to'];
        $this->data['departure_date'] = isset($request->departure_date) ? $request->departure_date : date('Y/m/d');
        $this->data['arrival_date'] = $request->arrival_date;
        $this->data['seat'] = $request->seat;

//        $schedules=Schedules::where('departure_date','>=','2010/00/10')->get();
//        foreach ($schedules as $key => $schedule) {
//            $destination = $schedule->routes->destination;
//            $destination = explode(',', $destination);
//            $count = count($destination);
//            for ($i = 0; $i < $count; $i++) {
//                if ($this->data['from'] == $destination[$i]) {
//                    for ($j = ++$i; $j < $count; $j++) {
//                        if ($this->data['to'] == $destination[$j]) {
//                            $this->search_schedules[] = $schedule->schedules_id;
//                            break;
//                        }
//                    }
//                }
//            }
//        }


        //why to waster time
        $this->data['results_id']=$request->results_id;
        $this->search_schedules=explode(',',$this->data['results_id']);


        if (isset($request->bustype) && !isset($request->shift) && !isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->where([
                    ['bustypes.bustypes_id', $this->data['bustype']],
                    ])
                ->get();
        }
        if (!isset($request->bustype) && !isset($request->shift) && isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'buses.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'buses.title as bustitle', 'bustypes.title as bustypes_title')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->orderBy('schedules.ticket_price', $this->data['price'])
                ->get();
        }
        if (!isset($request->bustype) && isset($request->shift) && !isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->where([
                    ['schedules.shift', $this->data['shift']]
                ])
                ->get();
        }
        if (isset($request->shift) && isset($request->bustype) && !isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->where([
                    ['bustypes.bustypes_id', $this->data['bustype']],
                    ['schedules.shift', $this->data['shift']]
                ])
                ->get();
        }
        if (!isset($request->shift) && isset($request->bustype) && isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->where([
                    ['bustypes.bustypes_id', $this->data['bustype']],
                ])
                ->orderBy('schedules.ticket_price', $this->data['price'])
                ->get();

        }
        if (isset($request->shift) && !isset($request->bustype) && isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->where([
                    ['schedules.shift', $this->data['shift']]
                ])
                ->orderBy('schedules.ticket_price', $this->data['price'])
                ->get();
        }

        if (isset($request->shift) && isset($request->bustype) && isset($request->price)) {
            $this->data['results'] = DB::table('schedules')
                ->join('buses', 'schedules.buses_id', '=', 'buses.buses_id')
                ->join('routes', 'schedules.routes_id', '=', 'routes.routes_id')
                ->join('bustypes', 'buses.bustypes_id', '=', 'bustypes.bustypes_id')
                ->select('schedules.*', 'buses.*', 'routes.*', 'bustypes.*')
                ->whereIn(
                    'schedules_id', $this->search_schedules
                )
                ->where([
                    ['buses.bustypes_id', $this->data['bustype']],
                    ['schedules.shift', $this->data['shift']]
                ])
                ->orderBy('schedules.ticket_price', $this->data['price'])
                ->get();
        }

        $this->data['count'] = count($this->data['results'], COUNT_RECURSIVE);
        $this->data['bustypes'] = Bustypes::all();
        return view('frontend.searches')->with($this->data);
    }


    public function socialLogin($social)

    {

        return Socialite::driver($social)->redirect();

    }


    public function handleProviderCallback($social)

    {
        $data['whoweare'] = Whoweare::all();
        $data['whatweoffer'] = Whatweoffer::all();
        $data['testimonials'] = Testimonials::all();

        $userSocial = Socialite::driver($social)->user();

        $user = Users::where(['email' => $userSocial->getEmail()])->first();

        if ($user) {

            Auth::login($user);

            return redirect()->route('home');

        } else {

            return view('frontend.index', ['email' => $userSocial->getEmail()])->with($data);

        }

    }


}
