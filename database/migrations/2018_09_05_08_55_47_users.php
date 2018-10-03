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
    Capsule::schema()->create('users', function ($table) {
      $table->increments("id");
      $table->string('secret')->nullable();
      $table->string('name');
      $table->string("email")->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('api_key')->nullable();
      $table->string('password');
      $table->rememberToken();
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
    Capsule::schema()->dropIfExists('users');
  }
}