<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('contact');
             $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',60);
            $table->string('cpassword',60)->nullable();
            $table->string('image');
            $table->integer('payment')->default('0');
            $table->string('sub_id')->nullable();
            $table->string('invoice')->nullable();
            $table->string('customer_id')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
