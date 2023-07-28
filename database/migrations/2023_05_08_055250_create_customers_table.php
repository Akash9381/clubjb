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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('email')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('pincode')->nullable();
            $table->string('landmark')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('bussiness_profile')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('ref_number_2')->nullable();
            $table->string('wp_msg')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
