<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Person::all() as $person) {
            $limit = rand(1, 3);

            for ($x = 0; $x <= $limit; $x++) {
                $mobiles = [20,30,70];
                DB::table('person_mobiles')->insert([
                   'person_id'  => $person->id,
                   'mobile_number' => '+36'.$mobiles[array_rand($mobiles)].random_int(100000, 999999),
                   'created_at' => now(),
                   'updated_at' => now(),
               ]);
            } // for
        } // foreach
    }
}
