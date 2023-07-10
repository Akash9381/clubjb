<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function Home()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    public function authenticate(Request $request)
    {
        $this->Validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('admin')) {
                return redirect('/admin/dashboard');
            } else {
                redirect('/admin/login');
            }
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function ShopLogout()
    {
        Auth::logout();
        return redirect(route('shop.login'));
    }

    public function EmployeeAuthenticate(Request $request)
    {
        $this->Validate($request, [
            'phone'     => 'required',
            'login_pin'  => 'required'
        ]);

        $user = User::where('phone', $request['phone'])->where('login_pin', $request['login_pin'])->first();
        if ($user) {
            if ($user->hasRole('employee')) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/employee/dashboard');
            } else {
                return back()->with('error', 'Whoops! invalid number and login pin.');
            }
        } else {
            return back()->with('error', 'Whoops! invalid number and login pin.');
        }
    }

    public function EmployeeLogout()
    {
        Auth::logout();
        return redirect(route('employee.login'));
    }

    public function ShopKeeperAuth(Request $request)
    {
        $this->Validate($request, [
            'phone'     => 'required',
            'login_pin' => 'required'
        ]);

        $user = User::where('phone', $request['phone'])->where('login_pin', $request['login_pin'])->first();
        if ($user) {
            try {
                if ($user->hasRole('shopkeeper')) {
                    Auth::login($user);
                    $request->session()->regenerate();
                    return Redirect::route('ShopDashboard');
                } else {
                    return back()->with('error', 'Whoops! invalid number and login pin.');
                }
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Whoops! invalid number and login pin.');
        }
    }

    public function UserAuth(Request $request)
    {
        // return $request->all();
        $this->Validate($request, [
            'phone_number' => 'required|numeric|digits:10',
        ]);
        $user = User::where('phone', $request['phone_number'])->first();
        $phone = $request['phone_number'];
        if ($user) {
            return Redirect::route('loginpin',['phn'=>$phone]);
        } else {
            return Redirect::route('register',['phn'=>$phone]);
        }
    }

    public function UserLogin(Request $request)
    {
        $this->validate($request, [
            'pin1' => 'required|numeric|digits:1',
            'pin2' => 'required|numeric|digits:1',
            'pin3' => 'required|numeric|digits:1',
            'pin4' => 'required|numeric|digits:1',
            'phn'  => 'required|numeric|digits:10',
        ]);
        $login = $request['pin1'] . $request['pin2'] . $request['pin3'] . $request['pin4'];
        $user = User::where('phone', $request['phn'])->where('login_pin', $login)->first();
        if ($user) {
            try {
                if ($user->hasRole('customer')) {
                    Auth::login($user);
                    $request->session()->regenerate();
                    return redirect('user/home');
                } else {
                    return back()->with('error', 'Whoops! invalid number and login pin.');
                }
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Whoops! invalid number and login pin.');
        }
    }
}
