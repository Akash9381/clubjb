<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // ***************************** Employee Data ****************************************
    public function Employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }
    public function GetEmployeePicture()
    {
        return $this->hasMany(EmployePictureDocument::class, 'user_id', 'id');
    }
    public function GetEmployeeAadhar()
    {
        return $this->hasMany(EmployeAadharDocument::class, 'user_id', 'id');
    }
    public function GetEmployeeCV()
    {
        return $this->hasMany(EmployeCVDocument::class, 'user_id', 'id');
    }
    public function GetEmployeePassPort()
    {
        return $this->hasMany(EmployeePassportDocument::class, 'user_id', 'id');
    }
    public function GetEmployeeDriving()
    {
        return $this->hasMany(EmployeDrivingDocument::class, 'user_id', 'id');
    }
    public function GetEmployeeAgreement()
    {
        return $this->hasMany(EmployeeAgrementDocument::class, 'user_id', 'id');
    }


    // *********************************** Customer Data *************************************
    public function Customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }

    public function UserDeal(){
        return $this->hasMany(Deal::class,'user_id','id');
    }

    // *********************************** Local Shop Data *************************************
    public function LocalShop()
    {
        return $this->hasOne(Shop::class, 'user_id', 'id');
    }
    public function GetShopPicture()
    {
        return $this->hasMany(ShopPicture::class, 'user_id', 'id');
    }
    public function GetShopMenu()
    {
        return $this->hasMany(ShopMenu::class, 'user_id', 'id');
    }
    public function GetShopDeals()
    {
        return $this->hasMany(ShopDeal::class, 'user_id', 'id');
    }
    public function GetShopAgreement()
    {
        return $this->hasMany(ShopAgreement::class, 'user_id', 'id');
    }
    // ******************************* Global Shop *******************************************
    public function GlobalShop()
    {
        return $this->hasOne(GlobalShop::class, 'user_id', 'id');
    }

    public function ActiveShopKeeper()
    {
        return $this->hasOne(Shop::class, 'user_id', 'id')->where('status', '=', 0);
    }
    public function InActiveShopKeeper()
    {
        return $this->hasOne(Shop::class, 'user_id', 'id')->where('status', '=', 1);
    }
    public function ProfileImage()
    {
        return $this->hasOne(EmployePictureDocument::class, 'user_id', 'id');
    }
}
