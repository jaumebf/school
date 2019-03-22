<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pla_individualitzat;
use App\Aspecte_personal;
use App\Atencio_diversitat;
use App\Alumne;

class Alumnes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //LLISTAR
    public function llistat(){
        //$llistat = \App\Product::all(); TOTS
        $llistat = Alumne::orderBy('course')->paginate(12);
        return view('alumnes.llistat')->with('alumnes',$llistat);              
    }
    
    //ESBORRAR
    public function esborrar($id){          
        $alumne = Alumne::findOrFail($id);
        $alumne->delete();
        
        return redirect('alumnes/llistat')->with('message','Alumne esborrat correctament');
    }
    
    //ACTUALITZAR VEURE
    public function actualitzar($id){
        $alumne = Alumne::findOrFail($id);
        return view('alumnes.actualitzar')->with('alumne',$alumne);
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
    
 
    //ALTA MOSTRAR FORMULARI
    public function alta(){
        return view('alumnes.alta');
    }
    
    
    //AFEGIR
    public function afegir(Request $request){
        $request->validate([
            'nom' => 'required|max:100',
            'cognom' => 'required|max:100',
            'curs' => 'required|numeric|min:1|max:8',
            'dni' => 'required|min:1|max:9',
            'dob' => 'required|date|date_format:Y-m-d',
            ]); 
        
        $alumne = new Alumne();
        $alumne->name = $request->nom;
        $alumne->surname = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->course = $request->curs;
        $alumne->dob = $request->dob;
        $alumne->save();
        return redirect('/plaindividualitzat/afegir/'.$alumne->id);
    }
    
    public function afegirAlumne(Request $request){
        $request->validate([
            'nom' => 'required|max:100',
            'cognom' => 'required|max:100',
            'curs' => 'required|numeric|min:1|max:8',
            'dni' => 'required|min:1|max:9',
            'dob' => 'required|date|date_format:Y-m-d',
            ]); 
        
        $alumne = new Alumne();
        $alumne->name = $request->nom;
        $alumne->surname = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->course = $request->curs;
        $alumne->dob = $request->dob;
        $alumne->save();
        
        
        //Aspectes personals
        $alumne = Alumne::findOrFail($alumne->id);
        $exist = Aspecte_personal::find($alumne->id);

        if (!$exist) {
            $asP = new Aspecte_personal();
            $asP->alumne_id = $alumne->id;
            $asP->motivacio = 0;
            $asP->concentracio = 0;
            $asP->agenda = 0;
            $asP->relacio = 0;
            $asP->participacio = 0;
            $asP->relacio_profesor = 0;
            $asP->emocions = 0;
            $asP->normes = 0;
            $asP->comportament = 0;
            $asP->puntualitat = 0;
            $asP->save();
        }
        
        
        //Pla individualitzat
        $alumne = Alumne::findOrFail($alumne->id);
        $exist = Pla_individualitzat::find($alumne->id);

        if (!$exist) {
            $pla = new Pla_individualitzat();
            $pla->alumne_id = $alumne->id;
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
        }
        
        
        //Atenció diversitat
        $alumne = Alumne::findOrFail($alumne->id);        
        $exist = Atencio_diversitat::find($alumne->id);

        if(!$exist) {
            $atencio = new Atencio_diversitat();
            $atencio->alumne_id = $alumne->id;
            $atencio->ed_especial = 0;
            $atencio->acollida = 0;
            $atencio->suport_linguistic = 0;
            $atencio->sep = 0;
            $atencio->vetllador = 0;
            $atencio->at_individual = 0;
            $atencio->save();
        }

        return redirect('alumnes/llistat')->with('message','Alumne afegit correctament');
        
    }  
    
    function actualitzarForm($id){
        $asP = Aspecte_personal::findOrFail($id);
        $pla = Pla_individualitzat::findOrFail($id);
        $atencio = Atencio_diversitat::findOrFail($id);
        return view('accions.formulari')
                ->with('asP',$asP)
                ->with('pla',$pla)
                ->with('atencio',$atencio);
    }
    
    function modificarForm(Request $request){
        $asP = Aspecte_personal::findOrFail($request->id);

        ($request->input('motivacio')) ? $asP->motivacio = $request->input('motivacio') : $asP->motivacio = 0;
        ($request->input('concentracio')) ? $asP->concentracio = $request->input('concentracio') : $asP->concentracio = 0;
        ($request->input('agenda')) ? $asP->agenda = $request->input('agenda') : $asP->agenda = 0;
        ($request->input('relacio')) ? $asP->relacio = $request->input('relacio') : $asP->relacio = 0;
        ($request->input('participacio')) ? $asP->participacio = $request->input('participacio') : $asP->participacio = 0;
        ($request->input('relacioprofesor')) ? $asP->relacio_profesor = $request->input('relacioprofesor') : $asP->relacio_profesor = 0;
        ($request->input('emocions')) ? $asP->emocions = $request->input('emocions') : $asP->emocions = 0;
        ($request->input('normes')) ? $asP->normes = $request->input('normes') : $asP->normes = 0;
        ($request->input('comportament')) ? $asP->comportament = $request->input('comportament') : $asP->comportament = 0;
        ($request->input('puntualitat')) ? $asP->puntualitat = $request->input('puntualitat') : $asP->puntualitat = 0;

        $asP->save();

        
        $atencio = Atencio_diversitat::findOrFail($request->id);
        
        ($request->input('ed_especial')) ? $atencio->ed_especial = 1 : $atencio->ed_especial = 0;
        ($request->input('acollida')) ? $atencio->acollida = 1 : $atencio->acollida = 0;
        ($request->input('suport_linguistic')) ? $atencio->suport_linguistic = 1 : $atencio->suport_linguistic = 0;
        ($request->input('sep')) ? $atencio->sep = 1 : $atencio->sep = 0;
        ($request->input('vetllador')) ? $atencio->vetllador = 1 : $atencio->vetllador = 0;
        ($request->input('at_individual')) ? $atencio->at_individual = 1 : $atencio->at_individual = 0;
        
        $atencio->save();
        
        
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
        
        return redirect("alumnes/formulari/".$request->id)->with('message', 'Notes de l\'alumne/a actualitzades correctament');
    
    }
    
}// FINAL DE LA CLASE
