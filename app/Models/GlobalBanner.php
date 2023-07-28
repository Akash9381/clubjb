<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalBanner extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    public function GetShop()
    {
        return $this->hasOne(User::class, 'id', 'shop_id');
    }
}
