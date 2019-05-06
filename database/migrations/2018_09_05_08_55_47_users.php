<?php

use Illuminate\Database\Schema\Blueprint;
use Modulus\Hibernate\{Capsule, Migration};

class Users extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected function up()
  {
    Capsule::schema()->create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('secret')->nullable();
      $table->string('name');
      $table->string('email')->unique();
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
  protected function down()
  {
    Capsule::schema()->dropIfExists('users');
  }
}
