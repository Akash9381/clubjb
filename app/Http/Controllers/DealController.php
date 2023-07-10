<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\ShopDeal;
use Illuminate\Http\Request;

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
}
