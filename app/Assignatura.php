<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignatura extends Model
{
    public function alumnes(){
            
            return $this->belongsToMany('\App\Alumne');
        }
}
