<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Person::all() as $person) {
            $limit = rand(1, 4);
            for ($x = 0; $x <= $limit; $x++) {
                DB::table('person_emails')->insert([
                   'person_id'  => $person->id,
                   'email'      => fake()->unique()->safeEmail(),
                   'created_at' => now(),
                   'updated_at' => now(),
               ]);
            } // for
        } // foreach
    }
}
