<?php

use Modulus\Hibernate\Capsule;
use Illuminate\Database\Schema\Blueprint;

class MagicLinks
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Capsule::schema()->create('magic_links', function (Blueprint $table) {
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
    Capsule::schema()->dropIfExists('magic_links');
  }
}
