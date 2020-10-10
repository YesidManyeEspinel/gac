<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipocredito extends Model
{
    public function creditos(){
    	return $this->hasMany('App\Archivo');
    }
}
