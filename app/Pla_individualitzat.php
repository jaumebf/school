<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pla_individualitzat extends Model
{
    protected $table = 'Pla_individualitzat';

    public function alumne(){		
        return $this->hasOne('\App\Alumne', 'alumne_id');
    }   
}
