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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('site_name', 255);
            $table->string('question_img', 255);
            $table->text('question_home');
            $table->text('question_answer');
            $table->text('footer_title');
            $table->text('footer_contact');
            $table->text('footer_app_title');
            $table->text('footer_app_contact');
            $table->string('footer_app_img', 255);
            $table->softDeletes();
            $table->timestamps();

            // $table->string('site_name', 255)->nullable();
            // $table->string('site_name', 255)->nullable();
            // $table->foreignId('user_id')->nullable()->index();
            // $table->longText('payload');
            // $table->integer('last_activity')->index();
            // ///////////////
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
