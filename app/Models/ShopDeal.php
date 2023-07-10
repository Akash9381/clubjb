<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopDeal extends Model
{
    use HasFactory;
    public function GetShop()
    {
        return $this->hasOne(GlobalShop::class, 'shop_id', 'shop_id');
    }
    public function GetLocalShop()
    {
        return $this->hasOne(Shop::class, 'shop_id', 'shop_id');
    }
}
