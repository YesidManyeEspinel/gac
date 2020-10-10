<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoarchivo extends Model
{
    public function archivos(){
    	return $this->hasMany('App\Archivo');
    }
}
