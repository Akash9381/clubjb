<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('ref_number_2')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('hot_store')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('designation')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('pincode')->nullable();
            $table->string('landmark')->nullable();
            $table->string('shop_type')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('country_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('region_code')->nullable();
            $table->string('region_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('shop_help')->nullable();
            $table->text('shop_terms')->nullable();
            $table->string('status')->nullable();
            $table->string('active_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
