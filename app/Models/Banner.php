<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    public function GetShop()
    {
        return $this->hasOne(Shop::class, 'user_id', 'shop_id');
    }
}
