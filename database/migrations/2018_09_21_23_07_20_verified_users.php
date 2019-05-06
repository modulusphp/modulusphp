<?php

use Illuminate\Database\Schema\Blueprint;
use Modulus\Hibernate\{Capsule, Migration};

class VerifiedUsers extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected function up()
  {
    Capsule::schema()->create('verified_users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('email')->index();
      $table->string('token');
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
    Capsule::schema()->dropIfExists('verified_users');
  }
}
