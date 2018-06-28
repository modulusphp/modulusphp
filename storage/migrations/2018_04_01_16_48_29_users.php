<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class Users
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Capsule::schema()->create("users", function ($table) {
            $table->increments("id");
            $table->string("username")->unique();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("remember_token")->nullable();
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
        Capsule::schema()->dropIfExists("users");
    }
}