<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deal;
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
        $localstore_id = 'LS';
        $globalstore_id = 'GS';
        $localstores    = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->with('LocalShop')->where('customer_id', 'LIKE', "%{$localstore_id}%")->orderBy('id', 'desc')->where('status', '1')->get();
        $globalstores   = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->with('LocalShop')->where('customer_id', 'LIKE', "%{$globalstore_id}%")->orderBy('id', 'desc')->where('status', '1')->get();
        // return $hotstores;
        return view('users.home', compact('localstores', 'globalstores'));
    }
    public function LoginPin()
    {
        return view('users.login-pin');
    }

    public function GlobalShop()
    {
        $globalstore_id = 'GS';
        $globalstores   = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->with('GetShopDeals')->with('LocalShop')->where('customer_id', 'LIKE', "%{$globalstore_id}%")->orderBy('id', 'desc')->where('status', '1')->get();
        return view('users.global-store-list', compact('globalstores'));
    }

    public function LocalShop()
    {
        $localstore_id = 'LS';
        $localstores    = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->with('GetShopDeals')->with('LocalShop')->where('customer_id', 'LIKE', "%{$localstore_id}%")->orderBy('id', 'desc')->where('status', '1')->get();
        return view('users.local-store-list', compact('localstores'));
    }
    public function HotShop()
    {
        $globalstore_id = 'LS';
        $localstores    = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->with('GetShopDeals')->with('LocalShop')->where('customer_id', 'LIKE', "%{$globalstore_id}%")->orderBy('id', 'desc')->where('status', '1')->get();
        return view('users.hot-store-list', compact('localstores'));
    }

    public function Services()
    {
        $deals = Deal::with('GetDeal')->with('Shop')->where('get_deal_user_id', Auth::user()->id)->orderBy('id','desc')->get();
        // return $deals;
        return view('users.my-services', compact('deals'));
    }

    public function UserProfile()
    {
        $user   = User::where('id', Auth::user()->id)->first();
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
            'phone'             => 'required|integer|digits:10|unique:users',
            'login_pin'         => 'required|integer|digits:4'
        ]);
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($request['ref_number'])) {
            $request['ref_number'] = 'A-123456';
        } else {
            if (empty($ref_id)) {
                if (empty($ref_num)) {
                    return back()->with('error', 'Refer Id/Ref Number Invalid');
                }
            }
        }
        try {
            $customer_id            = 'C-' . sprintf("%06d", mt_rand(1, 999999));

            $data                   = new User();
            $data->name             = $request['name'];
            $data->phone            = $request['phone'];
            $data->email            = $request['email'];
            $data->login_pin        = $request['login_pin'];
            $data->state            = $request['state'];
            $data->city             = $request['city'];
            $data->ref_number       = $request['ref_number'];
            $data->address_1        = $request['address_1'];
            $data->address_2        = $request['address_2'];
            $data->pincode          = $request['pincode'];
            $data->landmark         = $request['landmark'];
            $data->customer_id      = $customer_id;
            $data->status           = 0;
            $data->save();
            $data->assignRole(['customer']);

            $customer                   = new Customer();
            $customer->user_id          = $data->id;
            $customer->customer_id      = $customer_id;
            $customer->payment_status    = 'Bronze';
            $customer->save();
            Auth::login($data);
            $request->session()->regenerate();
            return redirect('user/home');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function SignUp(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'phone'             => 'required|integer|digits:10',
            'login_pin'         => 'required|integer|digits:4',
        ]);

        $user               = User::where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if ($request['ref_number']) {
            if (empty($ref_id)) {
                if (empty($ref_num)) {
                    return back()->with('error', 'Refer Id/Ref Number Invalid');
                }
            }
        } else {
            $request['ref_number'] = $user['ref_number'];
        }
        User::where('phone', $request['phone'])->update([
            'login_pin'     => $request['login_pin'],
            'name'          => $request['name'],
            'email'         => $request['email'],
            'address_1'     => $request['address_1'],
            'address_2'     => $request['address_2'],
            'pincode'       => $request['pincode'],
            'landmark'      => $request['landmark'],
            'ref_number'    => $request['ref_number'],
        ]);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('user/home');
    }

    public function UpdateUser()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('users.edit-profile', compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {
            User::where('id', Auth::user()->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'address_1' => $request['address_1'],
            ]);
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $filenamewithextension = $image->getClientOriginalName();
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
                            'employee_id' => Auth::user()->customer_id
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
