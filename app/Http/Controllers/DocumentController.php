<?php

namespace App\Http\Controllers;

use App\Models\ShopAadhar;
use App\Models\ShopAgreement;
use App\Models\ShopCv;
use App\Models\ShopDriving;
use App\Models\ShopMenu;
use App\Models\ShopPanCard;
use App\Models\ShopPassport;
use App\Models\ShopPicture;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function DeleteShopMenu($id = null)
    {
        $image = ShopMenu::where('id', $id)->first();
        if ($image) {
            ShopMenu::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
    public function DeleteShopPic($id = null)
    {
        $image = ShopPicture::where('id', $id)->first();
        if ($image) {
            ShopPicture::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
    public function DeleteShopAdhar($id = null)
    {
        $image = ShopAadhar::where('id', $id)->first();
        if ($image) {
            ShopAadhar::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
    public function DeleteShopPanCard($id = null)
    {
        $image = ShopPanCard::where('id', $id)->first();
        if ($image) {
            ShopPanCard::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
    public function DeleteShopDriving($id = null)
    {
        $image = ShopDriving::where('id', $id)->first();
        if ($image) {
            ShopDriving::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
    public function DeleteShopPassport($id = null)
    {
        $image = ShopPassport::where('id', $id)->first();
        if ($image) {
            ShopPassport::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function DeleteShopCV($id = null)
    {
        $image = ShopCv::where('id', $id)->first();
        if ($image) {
            ShopCv::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
    public function DeleteShopAgreement($id = null)
    {
        $image = ShopAgreement::where('id', $id)->first();
        if ($image) {
            ShopAgreement::where('id', $id)->delete();
            return back()->with('success', 'Menu Deleted Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
}
