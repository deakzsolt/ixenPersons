<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 0; $x <= 15; $x++) {
            DB::table('persons')->insert([
                 'first_name'        => fake()->firstName(),
                 'middle_name'       => rand(0, 1) ? '' : fake()->firstName(),
                 'last_name'         => fake()->lastName(),
                 'permanent_address' => fake()->address(),
                 'temporary_address' => rand(0, 1) ? '' : fake()->address(),
                 'created_at'        => now(),
                 'updated_at'        => now(),
             ]);
        } // for
    }
}
