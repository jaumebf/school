<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspecte_personal extends Model
{
    protected $table = 'aspectes_personals';

	public function alumne(){
		
		return $this->hasOne('\App\Alumne', 'alumne_id');
	}   

}
