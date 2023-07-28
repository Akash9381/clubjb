<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\EmployePictureDocument;
use App\Models\GlobalShop;
use App\Models\Shop;
use App\Models\ShopDeal;
use App\Models\state;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function UserHome()
    {
        $localstores    = Shop::with('GetShopDeals')->orderBy('id', 'desc')->where('hot_store', '=', null)->where('status', '1')->get();
        $hotstores    = Shop::with('GetShopDeals')->orderBy('id', 'desc')->where('hot_store', '!=', null)->where('status', '1')->get();
        $globalstores   = GlobalShop::with('GetShopDeals')->orderBy('id', 'desc')->where('status', '1')->get();
        return view('users.home', compact('localstores', 'globalstores', 'hotstores'));
    }
    public function LoginPin()
    {
        return view('users.login-pin');
    }

    public function GlobalShop()
    {
        $globalstores   = GlobalShop::with('GetShopDeals')->orderBy('id', 'desc')->where('status', '1')->get();
        return view('users.global-store-list', compact('globalstores'));
    }

    public function LocalShop()
    {
        $localstores    = Shop::with('GetShopDeals')->orderBy('id', 'desc')->where('status', '1')->get();
        return view('users.local-store-list', compact('localstores'));
    }
    public function HotShop()
    {
        $localstores    = Shop::with('GetShopDeals')->orderBy('id', 'desc')->where('hot_store', '!=', null)->where('status', '1')->get();
        return view('users.local-store-list', compact('localstores'));
    }

    public function Services()
    {
        return view('users.my-services');
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
        if ($request['ref_number'] == null) {
            $request['ref_number'] = '9999999999';
        }
        try {
            $data                   = new User();
            $data->name             = $request['name'];
            $data->phone            = $request['phone'];
            $data->email            = $request['email'];
            $data->login_pin        = $request['login_pin'];
            $data->state            = $request['state'];
            $data->city             = $request['city'];
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

    public function UpdateUser()
    {
        $user = User::with('GetCustomer')->where('id', Auth::user()->id)->first();
        return view('users.edit-profile', compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
        // return $request->all();
        try {
            User::where('id', Auth::user()->id)->update([
                'name' => $request['name'],
                'email' => $request['email']
            ]);
            Customer::where('user_id', Auth::user()->id)->update([
                'customer_name' => $request['name'],
            ]);
            $customer_id = Customer::where('user_id', Auth::user()->id)->first('customer_id');
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $filenamewithextension = $image->getClientOriginalName();
                    // return $filenamewithextension;
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                    $extension = $image->getClientOriginalExtension();
                    $filenametostore = $filename . '_' . time() . '.' . $extension;
                    $image->storeAs('public/employee/picture_document', $filenametostore);

                    $featureimagepath = public_path('storage/employee/picture_document/' . $filenametostore);
                    Image::make($featureimagepath)->resize(600, 600)->save($featureimagepath);
                    EmployePictureDocument::updateOrCreate(
                        [
                            'user_id' => Auth::user()->id,
                        ],
                        [
                            'user_id' => Auth::user()->id,
                            'picture_document' => $filenametostore,
                            'employee_id' => $customer_id['customer_id']
                        ]
                    );
                }
            };
            return back()->with('success', 'Profile Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
