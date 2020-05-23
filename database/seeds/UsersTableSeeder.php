<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Raúl Eduardo Chuquillanqui Yupanqui',
            'nickname' => 'echuquillanquiy',
	        'email' => 'echuquillanquiy@gmail.com',
	        'password' => bcrypt('12345678'),
	        'dni' => '46589634',
	        'role' => 'administrador'
    	]);

        User::create([
            'name' => 'Milagros Talleod',
            'nickname' => 'mtalledo',
            'email' => 'm.talledo@mainin.com.pe',
            'password' => bcrypt('12345678'),
            'dni' => '00112211',
            'role' => 'administrador'
        ]);
    }
}
