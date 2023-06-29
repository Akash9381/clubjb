<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\state;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserHome()
    {
        return view('users.home');
    }

    public function UserProfile()
    {
        $phone  = Auth::user()->phone;
        $user   = User::with('GetCustomer')->where('phone', $phone)->first();
        try {
            return view('users.profile', compact('user'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function Register()
    {
        $states = state::all();
        return view('users.register', compact('states'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'phone'             => 'required|unique:users',
            'login_pin'         => 'required'
        ]);
        // return $request->all();
        try {
            $data                   = new User();
            $data->name             = $request['name'];
            $data->phone            = $request['phone'];
            $data->email            = $request['email'];
            $data->login_pin        = $request['login_pin'];
            $data->save();
            $data->assignRole(['customer']);
            $customer_id                = 'C-' . sprintf("%06d", mt_rand(1, 999999));
            $customer                   = new Customer();
            $customer->user_id          = $data->id;
            $customer->customer_id      = $customer_id;
            $customer->customer_name    = $request['name'];
            $customer->customer_number  = $request['phone'];
            $customer->address_1        = $request['address_1'];
            $customer->address_2        = $request['address_2'];
            $customer->pincode          = $request['pincode'];
            $customer->landmark         = $request['landmark'];
            $customer->state            = $request['state'];
            $customer->city             = $request['city'];
            $customer->bussiness_profile  = $request['bussiness_profile'];
            $customer->ref_number       = $request['ref_number'];
            $customer->status           = '0';
            $customer->save();
            return redirect('/')->with('success', 'Your Account has been created Successfully! Please login');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
