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
        $pla = Pla_individualitzat::findOrFail($request->id);
        
        ($request->input('llengua')) ? $pla->llengua = 1 : $pla->llengua = 0;
        ($request->input('llengua_castellana')) ? $pla->llengua_castellana = 1 : $pla->llengua_castellana = 0;
        ($request->input('llengua_inglesa')) ? $pla->llengua_inglesa = 1 : $pla->llengua_inglesa = 0;
        ($request->input('matematiques')) ? $pla->matematiques = 1 : $pla->matematiques = 0;
        ($request->input('cm_natural')) ? $pla->cm_natural = 1 : $pla->cm_natural = 0;
        ($request->input('cm_social')) ? $pla->cm_social = 1 : $pla->cm_social = 0;
        ($request->input('ed_artistica')) ? $pla->ed_artistica = 1 : $pla->ed_artistica = 0;
        ($request->input('ed_fisica')) ? $pla->ed_fisica = 1 : $pla->ed_fisica = 0;
        ($request->input('religio')) ? $pla->religio = 1 : $pla->religio = 0;
        ($request->input('valors')) ? $pla->valors = 1 : $pla->valors = 0;
        $pla->save();
        
        return redirect('alumnes/llistat')->with('message','Pla actualitzat correctament');
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
        return redirect('/atenciodiversitat/afegir/'.$id);        

    }
}
