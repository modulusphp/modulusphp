<?php

use Faker\Generator;
use Modulus\Security\Hash;
use Modulus\Utility\Seeder;
use Illuminate\Database\Capsule\Manager as DB;

class Users extends Seeder
{
  /**
   * Run seeder
   *
   * @param Generator $faker
   * @return void
   */
  protected function seed(Generator $faker)
  {
    DB::table('users')->insert([
      'name' => $faker->name,
      'email' => $faker->unique()->email,
      'password' => Hash::make('password'),
    ]);
  }
}
