<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Admin',
            'email'=>'clubjb@gmail.com',
            'phone' => '9999999999',
            'customer_id' => 'A-123456',
            'password'=>Hash::make('Admin@123'),
            'email_verified_at'=>Carbon::now()
        ]);
        $user->assignRole('admin');
    }
}
