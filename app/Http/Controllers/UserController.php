<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserHome()
    {
        return view('users.home');
    }

    public function UserProfile()
    {
        $phone  = Auth::user()->phone;
        $user   = User::with('GetCustomer')->where('phone', $phone)->first();
        try {
            return view('users.profile', compact('user'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
