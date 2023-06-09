<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealController extends Controller
{
    public function UserDealList(){
        return view('users.deal-list');
    }

    public function UserDeal(){
        return view('users.deal');
    }
}
