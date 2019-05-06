<?php

use Illuminate\Database\Schema\Blueprint;
use Modulus\Hibernate\{Capsule, Migration};

class MagicLinks extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected function up()
  {
    Capsule::schema()->create('magic_links', function (Blueprint $table) {
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
    Capsule::schema()->dropIfExists('magic_links');
  }
}
