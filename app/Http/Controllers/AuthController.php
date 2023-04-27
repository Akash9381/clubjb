<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request){
        $this->Validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            $request->session()->regenerate();
            if(Auth::user()->hasRole('admin')){
                return redirect('/admin/add-employee');
            }else{
                redirect('/admin/login');
            }
        }
        else{
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function Logout(Request $request){
        Auth::logout();
        return redirect(route('login'));
    }
}
