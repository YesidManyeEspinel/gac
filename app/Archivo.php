<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = "archivos";

    //Columnas para motrar de la tabla
    protected $fillable = ['tipoarchivo_id','cliente_id','nombre'];

    public function cliente(){
    	return $this->belongsTo('App\Cliente');
    }

    public function tipoarchivo(){
    	return $this->belongsTo('App\Tipoarchivo');
    }
}
