<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = ['id','nombre','apellido','tipo','documento','telefono','cupo','observacion'];

    public function archivos(){
    	return $this->hasMany('App\Archivo');
    }

    public function creditos(){
    	return $this->hasMany('App\Credito');
    }
}
