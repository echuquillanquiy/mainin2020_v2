<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'MINERA CHINALCO PERÚ S.A.',
            'ruc' => '20506675457',
            'address' => 'AV. EL DERBY NRO. 250 URB. EL DERBY (PISO 20) LIMA - LIMA - SANTIAGO DE SURCO'
        ]);
    }
}
