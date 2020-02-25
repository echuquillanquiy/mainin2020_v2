<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'INGENIERO',
        ]);

        Position::create([
            'name' => 'ELECTRICISTA',
        ]);

        Position::create([
            'name' => 'MECANICO',
        ]);

        Position::create([
            'name' => 'ELECTROMECANICO',
        ]);

        Position::create([
            'name' => 'SUPERVISOR',
        ]);

        Position::create([
            'name' => 'LOGISTICO',
        ]);
    }
}
