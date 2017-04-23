<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('dp_url')->default('dp.jpeg');

            $table->tinyInteger('verified')->default(0);
            $table->tinyInteger('status')->default(0);
            
            $table->string('email_token')->index()->nullable();
            $table->rememberToken();
            $table->timestamps();


            $table->string('role')->default('viewer');
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
