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


class TravellersController extends Controller
{

    public function profile()
    {
        if (Auth::guest() | Auth::user()->user_type != 'traveller') {
            return redirect()->route('home');
        }
        $travellerEmail = Auth::user()->email;
        $traveller = Travellers::where('email', $travellerEmail)->first();
        return view('frontend.traveller.profile', compact('traveller'));
    }

    public function editProfile()
    {
        if (Auth::guest() | Auth::user()->user_type != 'traveller') {
            return redirect()->route('home');
        }
        $travellerEmail = Auth::user()->email;
        $traveller = Travellers::where('email', $travellerEmail)->first();
        return view('frontend.traveller.profileedit', compact('traveller'));
    }

    public function updateProfile(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('home');
        }
        if ($request->isMethod('get')) {
            return redirect()->route('profile');
        }
        if ($request->isMethod('post')) {
            $travellerEmail = Auth::user()->email;
            $this->validate($request,
                [
                    'name' => 'required',
                    'contact' => 'required|numeric',
                    'address' => 'required'
                ]);
            $data['name'] = $request->name;
            $data['contact'] = $request->contact;
            $data['address'] = $request->address;
            $traveller = Travellers::where('email', $travellerEmail)->first();
            if ($request->hasFile('image')) {
                $destination = public_path("img/traveller");
                $file = $request->image;
                $extension = $file->getClientOriginalExtension();
                $filename = str_random() . "." . $extension;
                $file->move($destination, $filename);
                $data['image'] = $filename;
            }
            if (Travellers::where('email', $travellerEmail)->update($data)) {
                return redirect()->route('profile')->with('success', 'Your account has been successfully updated');
            }
            return redirect()->route('profile')->with('error', 'Sorry, the account couldn\'t be updated.');

        }

    }

    public function history()
    {
        return view('frontend.traveller.history');
    }
}
