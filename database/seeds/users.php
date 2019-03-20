<?php

use Carbon\Carbon;
use Faker\Generator;
use Modulus\Security\Hash;
use Modulus\Utility\Seeder;
use Modulus\Hibernate\Capsule as DB;

class Users extends Seeder
{
  /**
   * Run seeder
   *
   * @param Generator $faker
   * @return void
   */
  protected function seed(Generator $faker, ?int $index = null)
  {
    DB::table('users')->insert([
      'name' => $faker->name,
      'email' => $faker->unique()->email,
      'password' => Hash::make('password'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);
  }
}
