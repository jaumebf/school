<?php

use Illuminate\Database\Seeder;

class AssignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i = 1; $i <= 20; $i++) {
            App\Assignatura::create(
                    ["nom" => "producte$i",
                        "descripcio" => "producte$i",
                        "preu" => rand(1, 50)
            ]);
        }
    }
}
