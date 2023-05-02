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
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('picture_document')->nullable();
            $table->string('aadhar_document')->nullable();
            $table->string('driving_document')->nullable();
            $table->string('cv_document')->nullable();
            $table->string('passport_document')->nullable();
            $table->string('agreement_document')->nullable();
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
        Schema::dropIfExists('employee_documents');
    }
};
