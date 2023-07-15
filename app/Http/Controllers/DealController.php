<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\ShopDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    public function UserDealList($id = null)
    {
        $deals = ShopDeal::where('shop_id', $id)->orderBy('id', 'desc')->get();
        return view('users.deal-list', compact('deals'));
    }

    public function UserDeal($id = null)
    {

        $deal = ShopDeal::with('GetShop')->where('id', $id)->first();
        return view('users.deal', compact('deal'));
    }

    public function StoreDeal($id = null)
    {
        $deal = ShopDeal::with('GetLocalShop')->where('id', $id)->first();
        return view('users.dealdetail', compact('deal'));
    }

    public function LocalDealList($id = null)
    {
        $deals = ShopDeal::where('shop_id', $id)->orderBy('id', 'desc')->get();
        return view('users.local-store-deal', compact('deals'));
    }

    public function DealDelete($id = null)
    {
        $deal = ShopDeal::where('id', $id)->first();
        if ($deal) {
            ShopDeal::where('id', $id)->delete();
            return back()->with('success', 'Deal Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function EditDeal($id = null)
    {
        $deal = ShopDeal::where('id', $id)->first();
        return view('shopkeeper.create-deal', compact('deal'));
    }

    public function UpdateDeal(Request $request, $id = null)
    {
        try {
            ShopDeal::where('id', $id)->where('user_id', Auth::user()->id)->update([
                'shop_deal' => $request['shop_deal'],
                'saving_up_to' => $request['saving_up_to']
            ]);
            return back()->with('success', 'Deal Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return $request->all();
    }
}
