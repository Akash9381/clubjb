<?php

namespace App\Http\Controllers;

use App\Models\GlobalShop;
use App\Models\ShopAadhar;
use App\Models\ShopCv;
use App\Models\ShopDeal;
use App\Models\ShopDriving;
use App\Models\ShopMenu;
use App\Models\ShopPanCard;
use App\Models\ShopPassport;
use App\Models\ShopPicture;
use App\Models\User;
use Illuminate\Http\Request;

class GlobalShopController extends Controller
{

    public function InactiveGlobal(){
        $inactive_shops = GlobalShop::with('GetLocalShop')->where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.shop.inactive-global-shop', compact('inactive_shops'));
    }
    public function GlobalShop()
    {
        return view('admin.shop.global-shop');
    }

    public function GlobalShopStore(Request $request)
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

                $user->save();
                $user->assignRole(['shopkeeper', 'customer']);
                $shop_id = 'GS-' . sprintf("%06d", mt_rand(1, 999999));
                $shop               = new GlobalShop();
                $shop->user_id      = $user->id;
                $shop->shop_id      = $shop_id;
                $shop->ref_number   = $request->ref_number;
                $shop->category     = $request->category;
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
                if($request['deal']){
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

                return back()->with('success', 'Shop Create Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }
}
