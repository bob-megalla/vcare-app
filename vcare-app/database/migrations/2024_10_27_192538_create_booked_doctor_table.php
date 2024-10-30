<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booked_doctor', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('name');
            $table->string('phone',20);
            $table->string('email');
            $table->foreignId('doctor_id')->index();
            $table->integer('user_id');
            $table->enum('is_compeleted',['0','1'])->default('0');
            $table->enum('is_readed',['0','1'])->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_doctor');
    }
};
