<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    public function GetUser()
    {
        return $this->hasOne(User::class, 'id', 'get_deal_user_id');
    }

    public function GetDeal()
    {
        return $this->hasOne(ShopDeal::class, 'id', 'deal_id');
    }

    public function Shop()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
