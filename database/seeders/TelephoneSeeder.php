<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Person::all() as $person) {
            $limit = rand(1, 6);
            for ($x = 0; $x <= $limit; $x++) {
                DB::table('person_telephones')->insert([
                       'person_id'  => $person->id,
                       'telephone_number' => '+361'.random_int(100000, 999999),
                       'created_at' => now(),
                       'updated_at' => now(),
                   ]);
            } // for
        } // foreach
    }
}
