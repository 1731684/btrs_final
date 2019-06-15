<?php

namespace App\Http\Controllers\Frontend;

use App\Buses;
use App\Bustypes;
use App\FAQ;
use App\Routes;
use App\TNC;
use App\Travellers;
use App\Users;
use App\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Testimonials;
use App\Whoweare;
use App\Whatweoffer;

class LoginController extends Controller
{
    //

    public function registerUser(Request $request)
    {
        if (Auth::user() | $request->isMethod('get')) {
            return redirect()->back();
        }
        $traveller = new Travellers();
        $user = new Users();
        $this->validate($request,
            [
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
            ]);

        $data['email'] = $request->email;
        $user_data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $user_data['password'] = bcrypt($request->password);
        $user_data['user_type'] = 'traveller';
        $user_data['verification_code'] = md5(microtime());
        $user_data['status'] = 'hold';
        if ($this->emailValidate($user_data)) {
            if ($user->create($user_data) && $traveller->create($data)) {
                echo "<script>alert('You must validate your email to get logged in');</script>";
                return view('frontend.booking');
            } else {
                echo "<script>alert('Sorry, for the inconvience we are having internal problem);</script>";
            }
        } else {
            echo "<script>alert('Sorry, for the inconvience we are having registration problem);</script>";
        }
        return view('frontend.booking');
    }

    public function contactForm(Request $request)
    {
        $request->validate(
            [
                'contact_name' => 'required',
                'contact_email' => 'required|email',
                'contact_phone' => 'required',
                'contact_message' => 'required',
            ]
        );
        $data = [
            'name' => $request->contact_name,
            'email' => $request->contact_email,
            'phone' => $request->contact_phone,
            'bodyMessage' => $request->contact_message,
        ];
        Mail::send('frontend.contact_mail', $data, function ($message) use ($data) {
            $message->from('admin@gmail.com', 'btrs');
            $message->to('admin@gmail.com');
            $message->subject('Contact Message');
        });
        echo "<script>alert('Your message has been sent successfully');</script>";
        return redirect()->back()->with('success', 'Your message has been sent');
    }

    public function emailValidate($user_data)
    {
        $data = [
            'verification_code' => $user_data['verification_code'],
            'email' => $user_data['email'],
        ];
        Mail::send('frontend.validate_mail', $data, function ($message) use ($data) {
            $message->from('admin@gmail.com', 'btrs');
            $message->to($data['email']);
            $message->subject('btrs Email Verification');
        });
        return true;
    }

    public function registerVendor(Request $request)
    {
        $vendor = new Vendors();
        $user = new Users();
        $this->validate($request,
            [
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
            ]);
        $data['email'] = $request->email;
        $user_data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $user_data['password'] = bcrypt($request->password);
        $user_data['user_type'] = 'vendor';
        $user_data['verification_code'] = md5(microtime());
        $user_data['status'] = 'hold';
        if ($user->create($user_data) && $vendor->create($data)) {
            if ($this->emailValidate($user_data)) {
                echo "<script>alert('You must validate your email to gain vendor access');</script>";
                return redirect()->route('home');
            }
        } else {
            echo "<script>alert('Sorry, for the inconvience we are having registration problem);</script>";
        }
        return redirect()->route('home');
    }

    public function validateUser(Request $request)
    {
        $verification_code = $request->id;
        $user = Users::where('verification_code', $verification_code)->first();
        if ($user->status == 'verified') {
            echo "<script>alert('Your email has already been verified');</script>";
            return redirect()->route('home');
        }
        if ($user) {
            $user_data['status'] = 'verified';
            $user->update($user_data);
            echo "<script>alert('Email validation successful');</script>";
            return redirect()->route('home');
        } else {
            echo "<script>alert('Sorry, for the inconvience we are having validation problem);</script>";
        }
        return redirect()->route('home');
    }

    public function loginUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('home');
        }
        $data['whoweare'] = Whoweare::all();
            $data['whatweoffer'] = Whatweoffer::all();
            $data['testimonials'] = Testimonials::all();
        $email = $request->email;
        $password = $request->password;
        $remember = isset($request->remember) ? true : false;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            if (Auth::user()->user_type == 'traveller' && Auth::user()->status == 'verified') {
                $data['profile'] = 'online';
                Travellers::where('email', Auth::user()->email)->update($data);
                return redirect()->back();
            } elseif (Auth::user()->user_type == 'vendor' && Auth::user()->status == 'verified') {
                $data['profile'] = 'online';
                Vendors::where('email', Auth::user()->email)->update($data);
                return redirect()->back();
            } else {
                Auth::logout();
                return redirect()->back();
            }
        }
        echo "<script>alert('Invalid access');</script>";
        return view('frontend.index');
    }

    public function userLogout()
    {
        if (Auth::guest()) {
            return redirect()->route('home');
        }
        if (Auth::user()->user_type == 'traveller') {
            $data['profile'] = 'offline';
            Travellers::where('email', Auth::user()->email)->update($data);

        } elseif (Auth::user()->user_type == 'vendor') {
            $data['profile'] = 'offline';
            Vendors::where('email', Auth::user()->email)->update($data);
        }
        Auth::logout();
        return redirect()->route('home');
    }

}
