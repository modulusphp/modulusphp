<?php

use Illuminate\Database\Schema\Blueprint;
use Modulus\Hibernate\{Capsule, Migration};

class Migrations extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  protected function up()
  {
    Capsule::schema()->create('migrations', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title')->index();
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
    Capsule::schema()->dropIfExists('migrations');
  }
}
