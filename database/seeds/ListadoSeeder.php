<?php

use Illuminate\Database\Seeder;

class ListadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoarchivos')
        ->insert([
			['nombre' => 'CAMARA DE COMERCIO'],
			['nombre' => 'CEDULA DE CIUDADANIA'],
			['nombre' => 'DECLARACION DE RENTA'],
			['nombre' => 'ESTADOS FINANCIEROS'],
			['nombre' => 'EXTRACTOS BANCARIOS'],
			['nombre' => 'PAGARE Y CARTA DE INSTRUCCION'],
			['nombre' => 'REVISION DE DATACREDITO'],
			['nombre' => 'RUNT - R.U. NACIONAL DE TRANSITO'],
			['nombre' => 'RUT - REGISTRO UNICO TRIBUTARIO'],
			['nombre' => 'SOLICITUD DE CREDITO'],
			['nombre' => 'TARJETA DE PROPIEDAD VEHICULO'],
		]);
    }
}
