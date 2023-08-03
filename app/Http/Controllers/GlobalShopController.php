<?php

namespace App\Http\Controllers;

use App\Models\GlobalShop;
use App\Models\GlobalShopHelp;
use App\Models\GlobalShopTC;
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
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GlobalShopController extends Controller
{

    public function InactiveGlobal()
    {
        $globalstore_id = 'GS';
        $inactive_shops = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 0)->where('customer_id','LIKE',"%{$globalstore_id}%")->orderBy('id', 'desc')->get();
        return view('admin.shop.inactive-global-shop', compact('inactive_shops'));
    }

    public function GlobalShopStatus(Request $request)
    {
        if ($request['status'] == '0') {
            $data['status'] = GlobalShop::where('shop_id', $request['shop_id'])->update([
                'status' => $request['status'],
                'active_date' => null
            ]);
            return response()->json($data);
        } else {
            $data['status'] = GlobalShop::where('shop_id', $request['shop_id'])->update([
                'status' => $request['status'],
                'active_date' => Carbon::now()
            ]);
            return response()->json($data);
        }
    }

    public function ActiveGlobal()
    {
        $globalstore_id = 'GS';
        $active_shops = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 1)->where('customer_id','LIKE',"%{$globalstore_id}%")->orderBy('id', 'desc')->get();
        return view('admin.shop.active-global-shop', compact('active_shops'));
    }
    public function GlobalShop()
    {
        $help = GlobalShopHelp::where('id', 1)->first();
        $tc = GlobalShopTC::where('id', 1)->first();
        return view('admin.shop.global-shop', compact('tc', 'help'));
    }

    public function GlobalShopStore(Request $request)
    {
        $this->validate($request, [
            'shop_name'     => 'required',
            'phone'         => 'required|integer|digits:10'
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
                $shop_id = 'GS-' . sprintf("%06d", mt_rand(1, 999999));

                $user               = new User();
                $user->name         = $request['shop_name'];
                $user->phone        = $request['phone'];
                $user->login_pin    = $request['login_pin'];
                $user->customer_id  = $shop_id;
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

                if ($request['deal']) {
                    if (count($request['deal']) > 0) {
                        foreach ($request['deal'] as $key => $deal) {
                            $dl = new ShopDeal();
                            $dl->user_id = $user->id;
                            $dl->shop_id = $shop_id;
                            $dl->shop_deal = $request['deal'][$key];
                            $dl->saving_up_to = $request['saving_up_to'][$key];
                            $dl->save();
                        }
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

                return back()->with('success', 'Shop Added Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function ShopProfile($id = null)
    {
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', $id)->first();
        return view('admin.shop.global-shop-profile', compact('shop'));
    }

    public function ShopUpdate($id = null)
    {
        $shop = User::with('LocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopDeals')->with('GetShopAgreement')->where('id', $id)->first();
        return view('admin.shop.update-global-shop', compact('shop'));
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
                    'ref_number'    => $request->ref_number,
                    'address_1'     => $request->address_1,
                    'address_2'     => $request->address_2,
                    'pincode'       => $request->pincode,
                    'landmark'      => $request->landmark,
                ]);
                Shop::where('user_id', $id)->update([
                    'category'      => $request->category,
                    'sub_category'  => $request->sub_category,
                    'hot_store'     => $request->hot_store,
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

    public function GlobalShopHelp()
    {
        $help = GlobalShopHelp::where('id', 1)->first();
        return view('admin.shop.global-shop-help', compact('help'));
    }

    public function StoreGlobalShopHelp(Request $request)
    {
        $this->validate($request, [
            'help' => 'required'
        ]);
        GlobalShopHelp::updateOrCreate(
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
    public function StoreGlobalShopTerms(Request $request)
    {
        $this->validate($request, [
            'tc' => 'required'
        ]);
        GlobalShopTC::updateOrCreate(
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

    public function GlobalShopTerms()
    {
        $tc = GlobalShopTC::where('id', 1)->first();
        return view('admin.shop.global-shop-terms', compact('tc'));
    }
}
