<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('students')->insert([
            'first_name' => $faker->name(),
            'last_name' => $faker->name(),
            'school_name' => $faker->name(),
            'age' => $faker->numberBetween(6, 25),
            'email' => $faker->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
