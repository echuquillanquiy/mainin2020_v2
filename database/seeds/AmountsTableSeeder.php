<?php

use Illuminate\Database\Seeder;
use App\Amount;

class AmountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amount::create([
            'description' => 'INGENIERO',
            'amount' => '190'
        ]);

        Amount::create([
            'description' => 'ELECTRICISTA',
            'amount' => '180'
        ]);

        Amount::create([
            'description' => 'MECANICO',
            'amount' => '170'
        ]);

        Amount::create([
            'description' => 'ELECTROMECANICO',
            'amount' => '160'
        ]);

        Amount::create([
            'description' => 'SUPERVISOR',
            'amount' => '160'
        ]);

        Amount::create([
            'description' => 'LOGISTICO',
            'amount' => '180'
        ]);
    }
}
