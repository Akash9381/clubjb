<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\GlobalBanner;
use App\Models\GlobalShop;
use App\Models\Shop;
use App\Models\state;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    public function Banner()
    {
        $localstore_id = 'LS';
        $states = state::all();
        $shops  = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 1)->where('customer_id','LIKE',"%{$localstore_id}%")->orderBy('id', 'desc')->get();
        return view('admin.banner.add-banner', compact('states', 'shops'));
    }

    public function GlobalBanner()
    {
        $globalstore_id = 'GS';
        $shops = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 1)->where('customer_id','LIKE',"%{$globalstore_id}%")->orderBy('id', 'desc')->get();
        return view('admin.banner.add-global-banner', compact('shops'));
    }

    public function CreateBanner(Request $request)
    {
        $array = $request->all();
        $this->Validate($request, [
            'state'         => 'required',
            'city'          => 'required',
            'shop_id'       => 'required',
            'brand_name'    => 'required',
            'banner_name'   => 'required',
        ]);
        try {
            $banner = new Banner();
            $banner['shop_id']  = $request['shop_id'];
            $banner['state']    = $request['state'];
            $banner['city']     = $request['city'];
            $banner['brand_name']   = $request['brand_name'];
            $banner['banner_name']  = $request['banner_name'];
            if ($request->hasFile('banner_image')) {
                $filenamewithextension = $request->file('banner_image')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('banner_image')->getClientOriginalExtension();
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                $request->file('banner_image')->storeAs('public/shopbanner', $filenametostore);
                $featureimagepath = public_path('storage/shopbanner/' . $filenametostore);
                Image::make($featureimagepath)->resize(1960, 600)->save($featureimagepath);
                $array['banner_image'] = $filenametostore;
            }
            $banner['banner_image'] = $array['banner_image'];

            $banner->save();
            return back()->with('success', 'Banner Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function CreateGlobalBanner(Request $request)
    {
        $array = $request->all();
        $this->Validate($request, [
            'shop_id'       => 'required',
            'brand_name'    => 'required',
            'banner_name'   => 'required',
        ]);
        try {
            $banner = new GlobalBanner();
            $banner['shop_id']  = $request['shop_id'];
            $banner['brand_name']   = $request['brand_name'];
            $banner['banner_name']  = $request['banner_name'];
            if ($request->hasFile('banner_image')) {
                $filenamewithextension = $request->file('banner_image')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('banner_image')->getClientOriginalExtension();
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                $request->file('banner_image')->storeAs('public/shopbanner', $filenametostore);
                $featureimagepath = public_path('storage/shopbanner/' . $filenametostore);
                Image::make($featureimagepath)->resize(1960, 600)->save($featureimagepath);
                $array['banner_image'] = $filenametostore;
            }
            $banner['banner_image'] = $array['banner_image'];

            $banner->save();
            return back()->with('success', 'Banner Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function BannerList()
    {
        $banners = Banner::with('GetShop')->get();
        return view('admin.banner.banners-list', compact('banners'));
    }

    public function GlobalBannerList()
    {
        $banners = GlobalBanner::with('GetShop')->get();
        return view('admin.banner.global-banners-list', compact('banners'));
    }

    public function BannerView($id = null)
    {
        $banner = Banner::with('GetShop')->where('id', $id)->first();
        if ($banner) {
            return view('admin.banner.banner-view', compact('banner'));
        } else {
            return back()->with('error', 'Banner Not Defined');
        }
    }

    public function GlobalBannerView($id = null)
    {
        $banner = GlobalBanner::with('GetShop')->where('id', $id)->first();
        if ($banner) {
            return view('admin.banner.global-banner-view', compact('banner'));
        } else {
            return back()->with('error', 'Banner Not Defined');
        }
    }

    public function BannerUpdate($id = null)
    {
        $localstore_id = 'LS';
        $states = state::all();
        $shops  = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 1)->where('customer_id','LIKE',"%{$localstore_id}%")->orderBy('id', 'desc')->get();
        $banner = Banner::with('GetShop')->where('id', $id)->first();
        return view('admin.banner.update-banner', compact('states', 'shops', 'banner'));
    }

    public function GlobalBannerUpdate($id = null)
    {
        $localstore_id = 'GS';
        $shops  = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'shopkeeper');
            }
        )->where('status', 1)->where('customer_id','LIKE',"%{$localstore_id}%")->orderBy('id', 'desc')->get();
        $banner = GlobalBanner::with('GetShop')->where('id', $id)->first();
        return view('admin.banner.update-global-banner', compact('shops', 'banner'));
    }

    public function UpdateBanner(Request $request, $id = null)
    {
        $array = $request->all();
        $this->Validate($request, [
            'state'         => 'required',
            'city'          => 'required',
            'shop_id'       => 'required',
            'brand_name'    => 'required',
            'banner_name'   => 'required',
        ]);

        try {
            if ($request->hasFile('banner_image')) {
                $filenamewithextension = $request->file('banner_image')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('banner_image')->getClientOriginalExtension();
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                $request->file('banner_image')->storeAs('public/shopbanner', $filenametostore);
                $featureimagepath = public_path('storage/shopbanner/' . $filenametostore);
                Image::make($featureimagepath)->resize(1960, 600)->save($featureimagepath);
                $array['banner_image'] = $filenametostore;
            } else {
                $banner = Banner::where('id', $id)->first();
                $array['banner_image'] = $banner['banner_image'];
            }
            // return $array['banner_image'];
            Banner::where('id', $id)->update([
                'shop_id'       => $request['shop_id'],
                'state'         => $request['state'],
                'city'          => $request['city'],
                'banner_name'   => $request['banner_name'],
                'brand_name'    => $request['brand_name'],
                'banner_image'  => $array['banner_image']
            ]);
            return back()->with('success', 'Banner Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function GlobalUpdateBanner(Request $request, $id = null)
    {
        $array = $request->all();
        $this->Validate($request, [
            'shop_id'       => 'required',
            'brand_name'    => 'required',
            'banner_name'   => 'required',
        ]);

        try {
            if ($request->hasFile('banner_image')) {
                $filenamewithextension = $request->file('banner_image')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('banner_image')->getClientOriginalExtension();
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                $request->file('banner_image')->storeAs('public/shopbanner', $filenametostore);
                $featureimagepath = public_path('storage/shopbanner/' . $filenametostore);
                Image::make($featureimagepath)->resize(1960, 600)->save($featureimagepath);
                $array['banner_image'] = $filenametostore;
            } else {
                $banner = GlobalBanner::where('id', $id)->first();
                $array['banner_image'] = $banner['banner_image'];
            }
            GlobalBanner::where('id', $id)->update([
                'shop_id'       => $request['shop_id'],
                'banner_name'   => $request['banner_name'],
                'brand_name'    => $request['brand_name'],
                'banner_image'  => $array['banner_image']
            ]);
            return back()->with('success', 'Banner Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function GlobalBannerDelete($id = null)
    {
        try {
            GlobalBanner::where('id', $id)->delete();
            return back()->with('success', 'Banner Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function BannerDelete($id = null)
    {
        try {
            Banner::where('id', $id)->delete();
            return back()->with('success', 'Banner Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
