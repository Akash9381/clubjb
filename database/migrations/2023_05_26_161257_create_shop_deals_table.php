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
        Schema::create('shop_deals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('shop_deal')->nullable();
            $table->string('saving_up_to')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('shop_deals');
    }
};
