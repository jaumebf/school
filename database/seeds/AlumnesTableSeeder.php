<?php

use Illuminate\Database\Seeder;

class AlumnesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            App\Alumne::create(
                    ["name" => "nom$i",
                    "surname" => "cognom$i",
                    "dni" => "dni$i",
                    "dob" => '2000-01-01',
                    "course" => rand(1, 50),
        ]);
        }
    }
}
