<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalShop extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function GetLocalShop()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function GetShopPicture()
    {
        return $this->hasMany(ShopPicture::class, 'shop_id', 'shop_id');
    }

    public function GetShopMenu()
    {
        return $this->hasMany(ShopMenu::class, 'shop_id', 'shop_id');
    }
    public function GetShopAdhar()
    {
        return $this->hasMany(ShopAadhar::class, 'shop_id', 'shop_id');
    }
    public function GetShopPanCard()
    {
        return $this->hasMany(ShopPanCard::class, 'shop_id', 'shop_id');
    }
    public function GetShopDriving()
    {
        return $this->hasMany(ShopDriving::class, 'shop_id', 'shop_id');
    }
    public function GetShopPassport()
    {
        return $this->hasMany(ShopPassport::class, 'shop_id', 'shop_id');
    }
    public function GetShopCv()
    {
        return $this->hasMany(ShopCv::class, 'shop_id', 'shop_id');
    }
    public function GetShopDeals()
    {
        return $this->hasMany(ShopDeal::class, 'shop_id', 'shop_id');
    }
    public function GetShopAgreement()
    {
        return $this->hasMany(ShopAgreement::class, 'shop_id', 'shop_id');
    }
}
