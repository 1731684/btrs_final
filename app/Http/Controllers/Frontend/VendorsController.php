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

class VendorsController extends Controller
{
    public function profileVendor()
    {
        if (Auth::guest() | Auth::user()->user_type != 'vendor') {
            return redirect()->route('home');
        }
        $vendorEmail = Auth::user()->email;
        $vendor = Vendors::where('email', $vendorEmail)->first();
        return view('frontend.vendor.profile', compact('vendor'));
    }

    public function editProfileVendor()
    {
        if (Auth::guest() | Auth::user()->user_type != 'vendor') {
            return redirect()->route('home');
        }
        $vendorEmail = Auth::user()->email;
        $vendor = Vendors::where('email', $vendorEmail)->first();
        return view('frontend.vendor.profileedit', compact('vendor'));
    }

    public function updateProfileVendor(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('home');
        }
        if ($request->isMethod('get')) {
            return view('frontend.vendor_profile');
        }
        if ($request->isMethod('post')) {
            $vendorEmail = Auth::user()->email;
            $this->validate($request,
                [
                    'name' => 'required',
                    'contact' => 'required|numeric',
                    'address' => 'required'
                ]);
            $data['name'] = $request->name;
            $data['contact'] = $request->contact;
            $data['address'] = $request->address;
            $vendor = Vendors::where('email', $vendorEmail)->first();
            if ($request->hasFile('image')) {
                $destination = public_path("img/vendor");
                $file = $request->image;
                $extension = $file->getClientOriginalExtension();
                $filename = str_random() . "." . $extension;
                $file->move($destination, $filename);
                $data['image'] = $filename;
            } else {
                $data['image'] = $vendor->image;
            }

            if (Vendors::where('email', $vendorEmail)->update($data)) {
                return redirect()->route('profileVendor')->with('success', 'Your account has been successfully updated');
            }
            return redirect()->route('profileVendor')->with('error', 'Sorry, the account couldn\'t be updated.');
        }

    }
}
