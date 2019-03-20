<?php

use Modulus\Hibernate\Capsule;
use Illuminate\Database\Schema\Blueprint;

class PasswordResets
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Capsule::schema()->create('password_resets', function (Blueprint $table) {
      $table->increments("id");
      $table->string("email")->index();
      $table->string("token");
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
    Capsule::schema()->dropIfExists('password_resets');
  }
}
