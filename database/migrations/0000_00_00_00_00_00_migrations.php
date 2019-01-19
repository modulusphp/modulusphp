<?php

use Modulus\Hibernate\Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migrations
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Capsule::schema()->create('migrations', function ($table) {
      $table->increments("id");
      $table->string('title')->index();
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
    Capsule::schema()->dropIfExists('migrations');
  }
}
