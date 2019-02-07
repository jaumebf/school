<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencio_diversitat extends Model
{
    //

    protected $table = 'atencio_diversitat';

	public function alumne(){
		
		return $this->hasOne('\App\Alumne', 'alumne_id');
	}   
}
