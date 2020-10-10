<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
	protected $table = "creditos";

    //Columnas para motrar de la tabla
    protected $fillable = ['tipocredito_id','cliente_id','credito','vigente'];

    public function cliente(){
    	return $this->belongsTo('App\Cliente');
    }

    public function tipocredito(){
    	return $this->belongsTo('App\Tipocredito');
    }
}
