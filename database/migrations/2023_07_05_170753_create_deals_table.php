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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('deal_id')->nullable();
            $table->string('get_deal_user_id')->nullable();
            $table->string('user_number')->nullable();
            $table->string('bill_number')->nullable();
            $table->string('amount')->nullable();
            $table->string('first_deal')->nullable();
            $table->string('active_date_first_deal')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('deals');
    }
};
