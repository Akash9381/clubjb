<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopAadhar;
use App\Models\ShopAgreement;
use App\Models\ShopCv;
use App\Models\ShopDeal;
use App\Models\ShopDriving;
use App\Models\ShopMenu;
use App\Models\ShopPanCard;
use App\Models\ShopPassport;
use App\Models\ShopPicture;
use App\Models\state as ModelsState;
use App\Models\User;
use App\Models\Deal;
use App\Models\LocalShopHelp;
use App\Models\LocalShopTC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class ShopKeeperController extends Controller
{
    public function EmployeeAddShop()
    {
        $states     = ModelsState::all();
        $help       = LocalShopHelp::where('id', 1)->first();
        $tc         = LocalShopTC::where('id', 1)->first();
        return view('employee.shopkeeper', compact('states','help','tc'));
    }

    public function GetLocation(Request $request)
    {
        // $ip = $request->ip();
        $ip = '49.35.41.195';
        $data['info'] = Location::get($ip);
        return response()->json($data);
    }

    public function CreateShop(Request $request)
    {
        $this->validate($request, [
            'shop_name'    => 'required',
            'phone'        => 'required|integer|digits:10',
            'city'         => 'required',
            'state'        => 'required',
            'ref_number'   => 'required'
        ]);

        $shop               = User::where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Number Invalid!');
            }
        }
        if ($shop) {
            return back()->with('error', 'Already Exist!');
        } else {
            try {
                $shop_id = 'LS-' . sprintf("%06d", mt_rand(1, 999999));

                $user = new User();
                $user->name         = $request['shop_name'];
                $user->phone        = $request['phone'];
                $user->login_pin    = '1111';
                $user->customer_id  = $shop_id;
                $user->state        = $request['state'];
                $user->city         = $request['city'];
                $user->ref_number   = $request['ref_number'];
                $user->address_1    = $request['address_1'];
                $user->address_2    = $request['address_2'];
                $user->pincode      = $request['pincode'];
                $user->landmark     = $request['landmark'];
                $user->status       = 0;
                $user->save();

                $user->assignRole(['shopkeeper', 'customer']);

                $shop               = new Shop();
                $shop->user_id      = $user->id;
                $shop->shop_id      = $shop_id;
                $shop->category     = $request->category;
                $shop->shop_type    = $request->shop_type;
                $shop->sub_category = $request->sub_category;
                $shop->hot_store    = $request->hot_store;
                $shop->contact_person = $request->contact_person;
                $shop->contact_number = $request->contact_number;
                $shop->designation  = $request->designation;
                $shop->ip_address   = $request->ip_address;
                $shop->country_name = $request->country_name;
                $shop->country_code = $request->country_code;
                $shop->region_code  = $request->region_code;
                $shop->region_name  = $request->region_name;
                $shop->city_name    = $request->city_name;
                $shop->zip_code     = $request->zip_code;
                $shop->shop_help    = $request->shop_help;
                $shop->shop_terms   = $request->shop_terms;
                $shop->save();

                if (!empty($request['deal'])) {
                    foreach ($request['deal'] as $key => $deal) {
                        $dl = new ShopDeal();
                        $dl->user_id = $user->id;
                        $dl->shop_id = $shop_id;
                        $dl->shop_deal = $request['deal'][$key];
                        $dl->saving_up_to = $request['saving_up_to'][$key];
                        $dl->save();
                    }
                }
                if ($request->hasFile('shop_menu')) {
                    foreach ($request->file('shop_menu') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_menu', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_menu/' . $filenametostore);
                        $data = new ShopMenu();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_menu = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_pic')) {
                    foreach ($request->file('shop_pic') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_pic', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_pic/' . $filenametostore);
                        $data = new ShopPicture();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_picture = $filenametostore;
                        $data->save();
                    }
                };


                if ($request->hasFile('shop_agreement')) {
                    foreach ($request->file('shop_agreement') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_agreement', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_agreement/' . $filenametostore);
                        $data = new ShopAgreement();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_agreement = $filenametostore;
                        $data->save();
                    }
                };

                return redirect('employee/shopkeeper-search')->with('success', 'Shop Created Successfully');
            } catch (\Exception $e) {
                return redirect('employee/shopkeeper-search')->with('error', $e->getMessage());
            }
        }
    }

    public function ShopForm()
    {
        $states     = ModelsState::all();
        $help       = LocalShopHelp::where('id', 1)->first();
        $tc         = LocalShopTC::where('id', 1)->first();
        return view('admin.shop.add-shop', compact('states', 'help', 'tc'));
    }

    public function StoreLocalShop(Request $request)
    {
        $this->validate($request, [
            'shop_name'    => 'required',
            'phone'        => 'required|integer|digits:10',
            'city'         => 'required',
            'state'        => 'required'
        ]);

        $shop               = User::where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if ($shop) {
            return back()->with('error', 'Already Exist!');
        } else {
            try {
                if (empty($request['ref_number'])) {
                    $request['ref_number'] = 'A-123456';
                } else {
                    if (empty($ref_id)) {
                        if (empty($ref_num)) {
                            return back()->with('error', 'Refer Id/Number Invalid!');
                        }
                    }
                }
                if (empty($request['login_pin'])) {
                    $request['login_pin'] = '1111';
                }

                $shop_id = 'LS-' . sprintf("%06d", mt_rand(1, 999999));

                $user = new User();
                $user->name         = $request['shop_name'];
                $user->phone        = $request['phone'];
                $user->login_pin    = $request['login_pin'];
                $user->customer_id  = $shop_id;
                $user->state        = $request['state'];
                $user->city         = $request['city'];
                $user->ref_number   = $request['ref_number'];
                $user->address_1    = $request['address_1'];
                $user->address_2    = $request['address_2'];
                $user->pincode      = $request['pincode'];
                $user->landmark     = $request['landmark'];
                $user->status       = 0;
                $user->save();

                $user->assignRole(['shopkeeper', 'customer']);

                $shop               = new Shop();
                $shop->user_id      = $user->id;
                $shop->shop_id      = $shop_id;
                $shop->category     = $request->category;
                $shop->shop_type    = $request->shop_type;
                $shop->sub_category = $request->sub_category;
                $shop->hot_store    = $request->hot_store;
                $shop->contact_person = $request->contact_person;
                $shop->contact_number = $request->contact_number;
                $shop->designation  = $request->designation;
                $shop->ip_address   = $request->ip_address;
                $shop->country_name = $request->country_name;
                $shop->country_code = $request->country_code;
                $shop->region_code  = $request->region_code;
                $shop->region_name  = $request->region_name;
                $shop->city_name    = $request->city_name;
                $shop->zip_code     = $request->zip_code;
                $shop->shop_help    = $request->shop_help;
                $shop->shop_terms   = $request->shop_terms;
                $shop->save();

                if (!empty($request['deal'])) {
                    foreach ($request['deal'] as $key => $deal) {
                        $dl = new ShopDeal();
                        $dl->user_id = $user->id;
                        $dl->shop_id = $shop_id;
                        $dl->shop_deal = $request['deal'][$key];
                        $dl->saving_up_to = $request['saving_up_to'][$key];
                        $dl->save();
                    }
                }
                if ($request->hasFile('shop_menu')) {
                    foreach ($request->file('shop_menu') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_menu', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_menu/' . $filenametostore);
                        $data = new ShopMenu();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_menu = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_pic')) {
                    foreach ($request->file('shop_pic') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_pic', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_pic/' . $filenametostore);
                        $data = new ShopPicture();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_picture = $filenametostore;
                        $data->save();
                    }
                };


                if ($request->hasFile('shop_agreement')) {
                    foreach ($request->file('shop_agreement') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_agreement', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_agreement/' . $filenametostore);
                        $data = new ShopAgreement();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_agreement = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Shop Create Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function InactiveLocalShop()
    {
        $localstore_id = 'LS';
        $inactive_shops = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 0)->where('customer_id','LIKE',"%{$localstore_id}%")->orderBy('id', 'desc')->get();
        return view('admin.shop.inactive-local-shop', compact('inactive_shops'));
    }

    public function ActiveLocalShop()
    {
        $localstore_id = 'LS';
        $active_shops = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 1)->where('customer_id','LIKE',"%{$localstore_id}%")->orderBy('id', 'desc')->get();
        return view('admin.shop.active-local-shop', compact('active_shops'));
    }

    public function ShopStatus(Request $request)
    {
        if ($request['status'] == '0') {
            $data['status'] = Shop::where('shop_id', $request['shop_id'])->update([
                'status' => $request['status'],
                'active_date' => null
            ]);
            return response()->json($data);
        } else {
            $data['status'] = Shop::where('shop_id', $request['shop_id'])->update([
                'status' => $request['status'],
                'active_date' => Carbon::now()
            ]);
            return response()->json($data);
        }
    }

    public function ShopProfile($id = null)
    {
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', $id)->first();
        return view('admin.shop.shop-profile', compact('shop'));
    }

    public function ShopUpdate($id = null)
    {
        $states = ModelsState::all();
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', $id)->first();
        return view('admin.shop.update-shop', compact('states', 'shop'));
    }

    public function EditShop($shop_id = null)
    {
        $states = ModelsState::all();
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', Auth::user()->id)->first();
        return view('shopkeeper.update-shop', compact('states', 'shop'));
    }

    public function ShopMenuDelete($id = null)
    {
        try {
            ShopMenu::where('id', $id)->delete();
            return back()->with('success', 'Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function ShopPicDelete($id = null)
    {
        try {
            ShopPicture::where('id', $id)->delete();
            return back()->with('success', 'Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function ShopAgreementDelete($id = null)
    {
        try {
            ShopAgreement::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function UpdateShop(Request $request, $id = null)
    {
        $shop               = User::where('id', $id)->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Ref Number Invalid');
            }
        }
        if ($shop) {
            try {
                User::where('id', $id)->update([
                    'name'          => $request['shop_name'],
                    'login_pin'     => $request['login_pin'],
                    'state'         => $request->state,
                    'city'          => $request->city,
                    'ref_number'    => $request->ref_number,
                    'address_1'    => $request->address_1,
                    'address_2'    => $request->address_2,
                    'pincode'      => $request->pincode,
                    'landmark'     => $request->landmark,
                ]);
                Shop::where('user_id', $id)->update([
                    'category'      => $request->category,
                    'sub_category'  => $request->sub_category,
                    'hot_store'     => $request->hot_store,
                    'contact_person' => $request->contact_person,
                    'contact_number' => $request->contact_number,
                    'designation'  => $request->designation,

                    'shop_type'    => $request->shop_type,
                    'ip_address'   => $request->ip_address,
                    'country_name' => $request->country_name,
                    'country_code' => $request->country_code,
                    'region_code'  => $request->region_code,
                    'region_name'  => $request->region_name,
                    'city_name'    => $request->city_name,
                    'zip_code'     => $request->zip_code,
                    'shop_help'    => $request->shop_help,
                    'shop_terms'   => $request->shop_terms,

                ]);
                if (!empty($request['deal'])) {
                    foreach ($request['deal'] as $key => $deal) {
                        $dl = new ShopDeal();
                        $dl->user_id = $id;
                        $dl->shop_id = $shop['customer_id'];
                        $dl->shop_deal = $request['deal'][$key];
                        $dl->saving_up_to = $request['saving_up_to'][$key];
                        $dl->save();
                    }
                }
                if ($request->hasFile('shop_menu')) {
                    foreach ($request->file('shop_menu') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_menu', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_menu/' . $filenametostore);
                        $data = new ShopMenu();
                        $data->user_id = $id;
                        $data->shop_id = $shop['customer_id'];
                        $data->shop_menu = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_pic')) {
                    foreach ($request->file('shop_pic') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_pic', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_pic/' . $filenametostore);
                        $data = new ShopPicture();
                        $data->user_id = $id;
                        $data->shop_id = $shop['customer_id'];
                        $data->shop_picture = $filenametostore;
                        $data->save();
                    }
                };


                if ($request->hasFile('shop_agreement')) {
                    foreach ($request->file('shop_agreement') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_agreement', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_agreement/' . $filenametostore);
                        $data = new ShopAgreement();
                        $data->user_id = $id;
                        $data->shop_id = $shop['customer_id'];
                        $data->shop_agreement = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Shop Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Not a Valid Shop');
        }
    }

    public function ShopReport()
    {
        $shops = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->whereIn('ref_number',[Auth::user()->phone,Auth::user()->customer_id])->get();
        return view('employee.shopkeeper_report', compact('shops'));
    }

    public function ShopkeeperCustomerReport()
    {
        $shops = Shop::where('ref_number', Auth::user()->phone)->get();
        return view('shopkeeper.shopkeeper_report', compact('shops'));
    }

    public function ShopEmployeeProfile($id = null)
    {
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', $id)->first();
        return view('employee.shopkeeper-profile', compact('shop'));
    }

    public function SearchCustomer(Request $request)
    {
        $phone = $request['phone'];
        if ($phone) {
            $this->validate($request, [
                'phone' => 'required'
            ]);
            $user = User::where('phone', $phone)->first();
            if ($user) {
                return redirect('shopkeeper/give-services?phone=' . $phone);
            } else {
                return redirect('shopkeeper/add-customer?phone=' . $phone);
            }
            return view('employee.add-customer', compact('phone'));
        } else {
            return view('shopkeeper.search_customer');
        }
    }

    public function CreateNewShopKeeper()
    {
        $states = ModelsState::all();
        return view('shopkeeper.add-shopkeeper', compact('states'));
    }

    public function StoreShopKeeper(Request $request)
    {
        $shop = User::where('phone', $request['shop_number'])->first();
        if ($shop) {
            return back()->with('error', 'User already exist');
        } else {
            try {
                $user = new User();
                $user->name = $request['shop_name'];
                $user->phone = $request['shop_number'];
                $user->login_pin = $request['login_pin'];
                $user->state = $request['state'];
                $user->city = $request['city'];
                $user->save();
                $user->assignRole(['shopkeeper', 'customer']);
                $shop_id = 'LS-' . sprintf("%06d", mt_rand(1, 999999));
                $shop               = new Shop();
                $shop->user_id      = $user->id;
                $shop->shop_id      = $shop_id;
                $shop->ref_number   = $request->ref_number;
                $shop->state        = $request->state;
                $shop->city         = $request->city;
                $shop->category     = $request->category;
                $shop->shop_type    = $request->shop_type;
                $shop->sub_category = $request->sub_category;
                $shop->hot_store    = $request->hot_store;
                $shop->shop_name    = $request->shop_name;
                $shop->shop_number  = $request->shop_number;
                $shop->contact_person = $request->contact_person;
                $shop->contact_number = $request->contact_number;
                $shop->designation  = $request->designation;
                $shop->address_1    = $request->address_1;
                $shop->address_2    = $request->address_2;
                $shop->pincode      = $request->pincode;
                $shop->landmark     = $request->landmark;
                $shop->ip_address   = $request->ip_address;
                $shop->country_name = $request->country_name;
                $shop->country_code = $request->country_code;
                $shop->region_code  = $request->region_code;
                $shop->region_name  = $request->region_name;
                $shop->city_name    = $request->city_name;
                $shop->zip_code     = $request->zip_code;
                $shop->shop_help    = $request->shop_help;
                $shop->shop_terms   = $request->shop_terms;
                $shop->status       = '0';
                $shop->save();
                if (!empty($request['deal'])) {
                    foreach ($request['deal'] as $key => $deal) {
                        $dl = new ShopDeal();
                        $dl->user_id = $user->id;
                        $dl->shop_id = $shop_id;
                        $dl->shop_deal = $request['deal'][$key];
                        $dl->saving_up_to = $request['saving_up_to'][$key];
                        $dl->save();
                    }
                }
                if ($request->hasFile('shop_menu')) {
                    foreach ($request->file('shop_menu') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_menu', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_menu/' . $filenametostore);
                        $data = new ShopMenu();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_menu = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_pic')) {
                    foreach ($request->file('shop_pic') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_pic', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_pic/' . $filenametostore);
                        $data = new ShopPicture();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_picture = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_aadhar_card')) {
                    foreach ($request->file('shop_aadhar_card') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_aadhar_card', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_aadhar_card/' . $filenametostore);
                        $data = new ShopAadhar();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_adahar = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_pan_card')) {
                    foreach ($request->file('shop_pan_card') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_pan_card', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_pan_card/' . $filenametostore);
                        $data = new ShopPanCard();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_pancard = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_driving')) {
                    foreach ($request->file('shop_driving') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_driving', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_driving/' . $filenametostore);
                        $data = new ShopDriving();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_driving = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_passport')) {
                    foreach ($request->file('shop_passport') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_passport', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_passport/' . $filenametostore);
                        $data = new ShopPassport();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_passport = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_cv')) {
                    foreach ($request->file('shop_cv') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_cv', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_cv/' . $filenametostore);
                        $data = new ShopCv();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_cv = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_agreement')) {
                    foreach ($request->file('shop_agreement') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_agreement', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_agreement/' . $filenametostore);
                        $data = new ShopAgreement();
                        $data->user_id = $user->id;
                        $data->shop_id = $shop_id;
                        $data->shop_agreement = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Shop Create Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function GiveService()
    {
        $id = Auth::user()->id;
        $deals = ShopDeal::where('user_id', $id)->get();
        // return $shop;
        return view('shopkeeper.give-services', compact('deals'));
    }

    public function TakeService(Request $request)
    {
        $id = Auth::user()->id;
        $shop = Shop::where('user_id', $id)->first();
        $user = User::where('phone', $request['phone'])->first();
        try {
            $deal = new Deal();
            $deal->user_id          = $id;
            $deal->shop_id          = $shop['shop_id'];
            $deal->deal_id          = $request['deal'];
            $deal->get_deal_user_id = $user['id'];
            $deal->user_number      = $user['phone'];
            $deal->bill_number      = $request['bill_number'];
            $deal->amount           = $request['amount'];
            $deal->save();
            return redirect(route('givendeals'))->with('success', 'Deal Given Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function Profile()
    {
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', Auth::user()->id)->first();
        return view('shopkeeper.profile', compact('shop'));
    }

    public function UpdateShopkeeper(Request $request)
    {
        $shop               = User::where('id', Auth::user()->id)->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Ref Number Invalid');
            }
        }
        if ($shop) {
            try {
                User::where('id', Auth::user()->id)->update([
                    'name'          => $request['shop_name'],
                    'login_pin'     => $request['login_pin'],
                    'state'         => $request->state,
                    'city'          => $request->city,
                    'ref_number'    => $request->ref_number,
                    'address_1'    => $request->address_1,
                    'address_2'    => $request->address_2,
                    'pincode'      => $request->pincode,
                    'landmark'     => $request->landmark,
                ]);
                Shop::where('user_id', Auth::user()->id)->update([
                    'category'      => $request->category,
                    'sub_category'  => $request->sub_category,
                    'contact_person' => $request->contact_person,
                    'contact_number' => $request->contact_number,
                    'designation'  => $request->designation,
                    'ip_address'   => $request->ip_address,
                    'country_name' => $request->country_name,
                    'country_code' => $request->country_code,
                    'region_code'  => $request->region_code,
                    'region_name'  => $request->region_name,
                    'city_name'    => $request->city_name,
                    'zip_code'     => $request->zip_code,
                    'shop_help'    => $request->shop_help,
                    'shop_terms'   => $request->shop_terms,

                ]);
                if (!empty($request['deal'])) {
                    foreach ($request['deal'] as $key => $deal) {
                        $dl = new ShopDeal();
                        $dl->user_id = Auth::user()->id;
                        $dl->shop_id = $shop['customer_id'];
                        $dl->shop_deal = $request['deal'][$key];
                        $dl->saving_up_to = $request['saving_up_to'][$key];
                        $dl->save();
                    }
                }
                if ($request->hasFile('shop_menu')) {
                    foreach ($request->file('shop_menu') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_menu', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_menu/' . $filenametostore);
                        $data = new ShopMenu();
                        $data->user_id = Auth::user()->id;
                        $data->shop_id = $shop['customer_id'];
                        $data->shop_menu = $filenametostore;
                        $data->save();
                    }
                };

                if ($request->hasFile('shop_pic')) {
                    foreach ($request->file('shop_pic') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_pic', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_pic/' . $filenametostore);
                        $data = new ShopPicture();
                        $data->user_id = Auth::user()->id;
                        $data->shop_id = $shop['customer_id'];
                        $data->shop_picture = $filenametostore;
                        $data->save();
                    }
                };


                if ($request->hasFile('shop_agreement')) {
                    foreach ($request->file('shop_agreement') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/shop/shop_agreement', $filenametostore);

                        $featureimagepath = public_path('storage/shop/shop_agreement/' . $filenametostore);
                        $data = new ShopAgreement();
                        $data->user_id = Auth::user()->id;
                        $data->shop_id = $shop['customer_id'];
                        $data->shop_agreement = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Profile Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Not a Valid Shop');
        }
    }

    public function GivenDeals()
    {
        $deals = Deal::with('GetUser')->with('GetDeal')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('shopkeeper.given-deals', compact('deals'));
    }

    public function Deals()
    {
        $deals = Shopdeal::where('user_id', Auth::user()->id)->get();
        return view('shopkeeper.deals', compact('deals'));
    }

    public function LocalShopHelp()
    {
        $help = LocalShopHelp::where('id', 1)->first();
        return view('admin.shop.local-shop-help', compact('help'));
    }

    public function StoreLocalShopHelp(Request $request)
    {
        $this->validate($request, [
            'help' => 'required'
        ]);
        LocalShopHelp::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'help' => $request['help']
            ]
        );
        return back()->with('success', 'Help Updated Successfully');
    }

    public function StoreLocalShopTerms(Request $request)
    {
        $this->validate($request, [
            'tc' => 'required'
        ]);
        LocalShopTC::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'tc' => $request['tc']
            ]
        );
        return back()->with('success', 'Help Updated Successfully');
    }

    public function LocalShopTerms()
    {
        $tc = LocalShopTC::where('id', 1)->first();
        return view('admin.shop.local-shop-terms', compact('tc'));
    }
}
