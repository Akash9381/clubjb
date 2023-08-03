<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopDeal extends Model
{
    use HasFactory;
    public function GetGlobalShop()
    {
        return $this->hasOne(GlobalShop::class, 'user_id', 'user_id');
    }
    public function GetLocalShop()
    {
        return $this->hasOne(Shop::class, 'shop_id', 'shop_id');
    }
    public function Shop()
    {
        return $this->hasOne(Shop::class, 'user_id', 'user_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
