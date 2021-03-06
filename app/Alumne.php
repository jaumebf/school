<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
	protected $table = 'alumnes';

	public function atencio_diversitat(){
		
		return $this->hasOne('\App\Atencio_diversitat', 'id');
	}   

	public function mesures_atencio(){
		
		return $this->hasOne('\App\Aspecte_personal', 'id');
	}   
        
	public function pla_individualitzat(){
		
		return $this->hasOne('\App\Pla_individualitzat', 'id');
	}   
        
        public function assignatura(){
            
            return $this->belongsToMany('\App\Assignatura', 'alumne_assignatura', 'alumne_id', 'assignatura_id');
        }
    
}
