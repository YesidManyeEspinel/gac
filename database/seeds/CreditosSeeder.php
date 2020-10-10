<?php

use Illuminate\Database\Seeder;

class CreditosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipocreditos')
        ->insert([
			['nombre' => 'DIRECTO'],
			['nombre' => 'EXPRESS'],
			['nombre' => 'SOLUNION'],
		]);
    }
}
