<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\ShopDeal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DealController extends Controller
{
    public function UserDealList($id = null)
    {
        $deals = ShopDeal::where('user_id', $id)->with('User')->orderBy('id', 'desc')->get();
        $shop_name = User::where('id', $id)->first();
        return view('users.deal-list', compact('deals', 'shop_name'));
    }

    public function UserDeal($id = null)
    {

        $deal = ShopDeal::with('User')->with('Shop')->where('id', $id)->first();
        return view('users.deal', compact('deal'));
    }

    public function StoreDeal($id = null)
    {
        $deal = ShopDeal::with('Shop')->with('User')->where('id', $id)->first();
        return view('users.dealdetail', compact('deal'));
    }

    public function LocalDealList($id = null)
    {
        $deals = ShopDeal::where('user_id', $id)->orderBy('id', 'desc')->get();
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

    public function AdminEditDeal($id = null)
    {
        $deal = ShopDeal::where('id', $id)->first();
        if ($deal) {
            return view('admin.shop.update-deal', compact('deal'));
        } else {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function AdminUpdateDeal(Request $request, $id = null)
    {
        $this->validate($request, [
            'shop_deal'    => 'required',
            'saving_up_to' => 'required',
        ]);
        try {
            ShopDeal::where('id', $id)->update([
                'shop_deal'    => $request['shop_deal'],
                'saving_up_to' => $request['saving_up_to']
            ]);
            return back()->with('success', 'Deal Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function AdminDealDelete($user_id = null, $id = null)
    {
        return $user_id;
        ShopDeal::where('id', $id)->delete();
        return back()->with('error', 'Deal Deleted Successfully');
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

    public function GivenDealUpdate($id = null)
    {
        $deal   = Deal::with('GetUser')->where('id', $id)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $deals  = Shopdeal::where('user_id', Auth::user()->id)->get();
        return view('shopkeeper.given-deal-update', compact('deal', 'deals'));
    }

    public function GivenDealEdited(Request $request, $id = null)
    {
        Deal::where('id', $id)->update([
            'deal_id' => $request['deal']
        ]);
        return Redirect(route('givendeals'))->with('success', 'Deal Updated Successfully');
    }
    public function DealTrash($id = null)
    {
        ShopDeal::where('id', $id)->update([
            'status' => 0
        ]);
        return back()->with('error', 'Deal Trashed Successfully');
    }

    public function DealStatus(Request $request)
    {

        $data = ShopDeal::where('id', $request['deal_id'])->update([
            'status' => $request['status']
        ]);
        return response()->json($data);
    }

    public function Invoice($id = null)
    {
        $deal = Deal::with('GetDeal')->with('Shop')->where('id',$id)->where('get_deal_user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        if($deal){
            return view('users.invoice',compact('deal'));
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }
}
