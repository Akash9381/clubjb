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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class ShopKeeperController extends Controller
{
    public function EmployeeAddShop()
    {
        $states = ModelsState::all();
        return view('employee.shopkeeper', compact('states'));
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
                $shop_id = 'LS-' . sprintf("%06d", mt_rand(1, 999999));
                $shop               = new Shop();
                $shop->user_id      = $user->id;
                $shop->shop_id      = $shop_id;
                $shop->ref_number   = $request->ref_number;
                $shop->state        = $request->state;
                $shop->city         = $request->city;
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
                $shop->shop_type    = $request->shop_type;
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

                return back()->with('success', 'Shop Create Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function ShopForm()
    {
        $states = ModelsState::all();
        return view('admin.shop.add-shop', compact('states'));
    }

    public function StoreLocalShop(Request $request)
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

    public function InactiveLocalShop()
    {
        $inactive_shops = Shop::with('GetLocalShop')->where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.shop.inactive-local-shop', compact('inactive_shops'));
    }

    public function ActiveLocalShop()
    {
        $active_shops = Shop::with('GetLocalShop')->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.shop.active-local-shop', compact('active_shops'));
    }

    public function ShopStatus(Request $request)
    {
        $data['status'] = Shop::where('shop_id', $request['shop_id'])->update([
            'status' => $request['status']
        ]);
        return response()->json($data);
    }

    public function ShopProfile($shop_id = null)
    {
        $shop = Shop::with('GetLocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopAdhar')->with('GetShopPanCard')->with('GetShopDriving')->with('GetShopPassport')->with('GetShopCv')->with('GetShopDeals')->with('GetShopAgreement')->where('shop_id', $shop_id)->first();
        return view('admin.shop.shop-profile', compact('shop'));
    }

    public function ShopUpdate($shop_id = null)
    {
        $states = ModelsState::all();
        $shop = Shop::with('GetLocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopAdhar')->with('GetShopPanCard')->with('GetShopDriving')->with('GetShopPassport')->with('GetShopCv')->with('GetShopDeals')->with('GetShopAgreement')->where('shop_id', $shop_id)->first();
        return view('admin.shop.update-shop', compact('states', 'shop'));
    }

    public function ShopMenuDelete($id = null)
    {
        try {
            ShopMenu::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function ShopPicDelete($id = null)
    {
        try {
            ShopPicture::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function ShopAdharDelete($id = null)
    {
        try {
            ShopAadhar::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function ShopPanDelete($id = null)
    {
        try {
            ShopPanCard::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function ShopDrivingDelete($id = null)
    {
        try {
            ShopDriving::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function ShopPassportDelete($id = null)
    {
        try {
            ShopPassport::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function ShopCvDelete($id = null)
    {
        try {
            ShopCv::where('id', $id)->delete();
            return back()->with('success', 'Delete Successfully');
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

    public function UpdateShop(Request $request, $shop_id = null)
    {
        $shop = Shop::where('shop_id', $shop_id)->first();
        if ($shop) {
            try {
                User::where('id', $shop->user_id)->update([
                    'name' => $request['shop_name'],
                    'login_pin' => $request['login_pin']
                ]);
                Shop::where('shop_id', $shop_id)->update([
                    'ref_number'    => $request->ref_number,
                    'state'         => $request->state,
                    'city'          => $request->city,
                    'category'      => $request->category,
                    'sub_category'  => $request->sub_category,
                    'hot_store'     => $request->hot_store,
                    'shop_name'     => $request->shop_name,
                    'shop_number'   => $request->shop_number,
                    'contact_person' => $request->contact_person,
                    'contact_number' => $request->contact_number,
                    'designation'  => $request->designation,
                    'address_1'    => $request->address_1,
                    'address_2'    => $request->address_2,
                    'pincode'      => $request->pincode,
                    'shop_type'    => $request->shop_type,
                    'landmark'     => $request->landmark,
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
                        $dl->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
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
                        $data->user_id = $shop['user_id'];
                        $data->shop_id = $shop_id;
                        $data->shop_agreement = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Shop Update Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Not a Valid Shop');
        }
    }

    public function ShopReport()
    {
        $shops = Shop::where('ref_number', Auth::user()->phone)->get();
        return view('employee.shopkeeper_report', compact('shops'));
    }

    public function ShopkeeperCustomerReport(){
        $shops = Shop::where('ref_number', Auth::user()->phone)->get();
        return view('shopkeeper.shopkeeper_report', compact('shops'));
    }

    public function ShopEmployeeProfile($shop_id = null)
    {
        $shop = Shop::with('GetLocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopAdhar')->with('GetShopPanCard')->with('GetShopDriving')->with('GetShopPassport')->with('GetShopCv')->with('GetShopDeals')->with('GetShopAgreement')->where('shop_id', $shop_id)->where('ref_number', Auth::user()->phone)->first();
        return view('employee.shopkeeper-profile', compact('shop'));
    }

    public function SearchCustomer(Request $request)
    {
        $search = $request['search'];
        $data = [];
        if ($search) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name', '<>', 'admin'); // role with no admin
            })->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('phone', 'like', '%' . $search . '%');
                }
            })->get();
            return view('shopkeeper.search_customer', compact('data'));
        } else {
            return view('shopkeeper.search_customer', compact('data'));
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
}
