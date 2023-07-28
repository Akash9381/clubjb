<?php

use App\Models\Customer;
use App\Models\Employee;
use App\Models\GlobalShop;
use App\Models\Shop;
use App\Models\city;
use App\Models\EmployePictureDocument;
use Illuminate\Support\Facades\Auth;
use Request as RQ;

if(!function_exists('setActiveClass')){
    function setActiveClass($path){
        return RQ::is($path.'*')?'active':'';
    }
}

if(!function_exists('InactiveEmployee')){
    function InactiveEmployee(){
       return Employee::where('status','0')->count();
    }
}
if(!function_exists('ActiveEmployee')){
    function ActiveEmployee(){
       return Employee::where('status','1')->count();
    }
}

if(!function_exists('InactiveCustomer')){
    function InactiveCustomer(){
       return Customer::where('status','0')->count();
    }
}

if(!function_exists('ActiveCustomer')){
    function ActiveCustomer(){
       return Customer::where('status','1')->count();
    }
}

if(!function_exists('InactiveLocalShop')){
    function InactiveLocalShop(){
       return Shop::where('status','0')->count();
    }
}

if(!function_exists('InactiveGlobalShop')){
    function InactiveGlobalShop(){
       return GlobalShop::where('status','0')->count();
    }
}

if(!function_exists('GetCity')){
    function GetCity(){
       return city::all();
    }
}

if(!function_exists('ProfileImage')){
    function ProfileImage(){
       $picture_image =  EmployePictureDocument::where('user_id',Auth::user()->id)->first('picture_document');
       return $picture_image['picture_document'];
    }
}




