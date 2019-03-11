<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pla_individualitzat;
use App\Alumne;

class PlaIndividualitzat extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //ACTUALITZAR VEURE
    public function actualitzar($id){
        $pla = Pla_individualitzat::findOrFail($id);
        return view('plaindividualitzat.actualitzar')->with('pla',$pla);
    }
    
    //MODIFICAR
    public function modificar(Request $request){
        $request->validate([
            'nom' => 'required|max:100',
            'cognom' => 'required|max:100',
            'curs' => 'required|numeric|min:1|max:8',
            'dni' => 'required|min:1|max:9',
            'dob' => 'required|date|date_format:Y-m-d',
            ]); 
        
        $alumne = Alumne::findOrFail($request->id);
        $alumne->name = $request->nom;
        $alumne->surname = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->course = $request->curs;
        $alumne->dob = $request->dob;
        $alumne->save();        
        return redirect('alumnes/llistat')->with('message','Alumne actualitzat correctament');
    }
    
    public function afegir($id){       
        $alumne = Alumne::findOrFail($id);        

        $pla = new Pla_individualitzat();
        $pla->alumne_id = $id;
        $pla->llengua = 0;
        $pla->llengua_castellana = 0;
        $pla->llengua_inglesa = 0;
        $pla->matematiques = 0;
        $pla->cm_natural = 0;
        $pla->cm_social = 0;
        $pla->ed_artistica = 0;
        $pla->ed_fisica = 0;
        $pla->religio = 0;
        $pla->valors = 0;       
        $pla->save();
        return redirect('alumnes/llistat')->with('message','Alumne afegit correctament');
    }
}
