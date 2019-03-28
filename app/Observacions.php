<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacions extends Model
{
    //

    protected $table = 'observ_faltes';

	public function alumne(){
		
		return $this->hasOne('\App\Alumne', 'alumne_id');
	}  
}
