<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'CHANCADO',
        ]);

        Area::create([
            'name' => 'PLANTA',
        ]);

        Area::create([
            'name' => 'FLOTACIÓN',
        ]);

        Area::create([
            'name' => 'CHANCADO / FLOTACIÓN',
        ]);

        Area::create([
            'name' => 'INSTURMENTACIÓN',
        ]);
    }
}
