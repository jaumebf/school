<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pla_individualitzat;
use App\Aspecte_personal;
use App\Atencio_diversitat;
use App\Alumne;
use App\Observacions;
use App\Assignatura;
use App\Alumne_Assignatura;

class Alumnes extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    //LLISTAR
    public function llistat() {
        //$llistat = \App\Product::all(); TOTS
        $llistat = Alumne::orderBy('course')->paginate(12);
        return view('alumnes.llistat')->with('alumnes', $llistat);
    }

    //ESBORRAR
    public function esborrar($id) {
        $alumne = Alumne::findOrFail($id);
        $alumne->delete();

        return redirect('alumnes/llistat')->with('message', 'Alumne esborrat correctament');
    }

    //ACTUALITZAR VEURE
    public function actualitzar($id) {
        $alumne = Alumne::findOrFail($id);
        return view('alumnes.actualitzar')->with('alumne', $alumne);
    }

    //MODIFICAR
    public function modificar(Request $request) {
        $request->validate([
            'nom' => 'required|max:100',
            'cognom' => 'required|max:100',
            'curs' => 'required|numeric|min:1|max:6',
            'classe' => 'required|max:1',
            'dni' => 'required|min:1|max:9',
            'dob' => 'required|date|date_format:Y-m-d',
        ]);

        $alumne = Alumne::findOrFail($request->id);
        $alumne->name = $request->nom;
        $alumne->surname = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->course = $request->curs;
        $alumne->class = $request->classe;
        $alumne->dob = $request->dob;
        $alumne->save();
        return redirect('alumnes/llistat')->with('message', 'Alumne actualitzat correctament');
    }

    //ALTA MOSTRAR FORMULARI
    public function alta() {
        return view('alumnes.alta');
    }

    //AFEGIR
    public function afegir(Request $request) {

        $request->validate([
            'nom' => 'required|max:100',
            'cognom' => 'required|max:100',
            'curs' => 'required|numeric|min:1|max:6',
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
        return redirect('/plaindividualitzat/afegir/' . $alumne->id);
    }

    public function afegirAlumne(Request $request) {
        $request->validate([
            'nom' => 'required|max:100',
            'cognom' => 'required|max:100',
            'curs' => 'required|numeric|min:1|max:8',
            'classe' => 'required|max:1',
            'dni' => 'required|min:1|max:9',
            'dob' => 'required|date|date_format:Y-m-d',
        ]);

        $alumne = new Alumne();
        $alumne->name = $request->nom;
        $alumne->surname = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->course = $request->curs;
        $alumne->class = $request->classe;
        $alumne->dob = $request->dob;
        $alumne->save();

        $alumne = Alumne::findOrFail($alumne->id);


        //Aspectes personals
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
        //$alumne = Alumne::findOrFail($alumne->id);
        $exist = Pla_individualitzat::find($alumne->alumne_id);

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
        //$alumne = Alumne::findOrFail($alumne->id);        
        $exist = Atencio_diversitat::find($alumne->id);

        if (!$exist) {
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


        //Assignatures        
        $exist = Alumne_Assignatura::where("alumne_id", $alumne->id)->first();
        if (!$exist) {

            $numAssignatures = count(Assignatura::get());

            for ($i = 0; $i < $numAssignatures; $i++) {
                $assignatures = new Alumne_Assignatura();
                $assignatures->assignatura_id = $i + 1;
                $assignatures->alumne_id = $alumne->id;
                $assignatures->actitud_1 = 5;
                $assignatures->actitud_2 = 5;
                $assignatures->actitud_3 = 5;
                $assignatures->esforc_1 = 5;
                $assignatures->esforc_2 = 5;
                $assignatures->esforc_3 = 5;
                $assignatures->treball_1 = 5;
                $assignatures->treball_2 = 5;
                $assignatures->treball_3 = 5;
                $assignatures->deures_1 = 5;
                $assignatures->deures_2 = 5;
                $assignatures->deures_3 = 5;
                $assignatures->adaptats = 2;
                $assignatures->qualificacio_1 = 5;
                $assignatures->qualificacio_2 = 5;
                $assignatures->qualificacio_3 = 5;
                $assignatures->comentari_1 = 5;
                $assignatures->comentari_2 = 5;
                $assignatures->comentari_3 = 5;
                $assignatures->comentari_4 = 5;
                $assignatures->observacions = '';
                $assignatures->save();
            }
        }

        //Observacions faltes
        $alumne = Alumne::findOrFail($alumne->id);
        $exist = Observacions::find($alumne->id);

        if (!$exist) {
            $observacions = new Observacions();
            $observacions->alumne_id = $alumne->id;
            $observacions->faltes = 0;
            $observacions->comentaris = 4;
            $observacions->comentaris = '';
            $observacions->observacions = '';
            $observacions->avaluacio = 4;
            $observacions->dia = '';
            $observacions->save();
        }

        return redirect('alumnes/llistat')->with('message', 'Alumne afegit correctament');
    }

    function actualitzarForm($id) {
        $asP = Aspecte_personal::findOrFail($id);
        $alumne = Alumne::findOrFail($id);
        $pla = Pla_individualitzat::findOrFail($id);
        $atencio = Atencio_diversitat::findOrFail($id);
        $observacions = Observacions::findOrFail($id);
        $alumneAssignaturaExist = Alumne_Assignatura::where("alumne_id", $id)->firstOrFail();

        $alumneAssignatura = false;
        if ($alumneAssignaturaExist) {
            $alumneAssignatura = Alumne_Assignatura::where("alumne_id", $id)->get();
        }
        $assignatures = Assignatura::all();

        return view('accions.formulari')
                        ->with('asP', $asP)
                        ->with('pla', $pla)
                        ->with('atencio', $atencio)
                        ->with('observacions', $observacions)
                        ->with('assignatures', $assignatures)
                        ->with('alumne', $alumne)
                        ->with('alumneAssignatura', $alumneAssignatura);
    }

    function modificarForm(Request $request) {
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


        $observacions = Observacions::findOrFail($request->id);

        ($request->input('faltes')) ? $observacions->faltes = $request->input('faltes') : $observacions->faltes = 0;
        ($request->input('numFaltesJust')) ? $observacions->numFaltesJust = $request->input('numFaltesJust') : $observacions->numFaltesJust = 4;
        ($request->input('faltesComentaris')) ? $observacions->comentaris = $request->input('faltesComentaris') : $observacions->comentaris = '';
        ($request->input('observacions')) ? $observacions->observacions = $request->input('observacions') : $observacions->observacions = '';
        ($request->input('dia')) ? $observacions->dia = $request->input('dia') : $observacions->dia = '';
        ($request->input('avaluacio')) ? $observacions->avaluacio = $request->input('avaluacio') : $observacions->dia = 4;

        $observacions->save();


        //Assignatures
        $exist = Alumne_Assignatura::where("alumne_id", $request->id)->first();
        if ($exist) {          
            $numAssignatures = count(Assignatura::get());
            $id_alumne = $exist->alumne_id;

            //Numero de assignatura
            $assignatura_id = 1;
            
            for ($i = 0; $i < $numAssignatures; $i++) {
                //$assignatures = Alumne_Assignatura::findOrFail($request->id);
                //// $assignatures = Alumne_Assignatura::where("alumne_id",$id_alumne->alumne_id)->get();   
                $assignatures = Alumne_Assignatura::where('assignatura_id', $assignatura_id)->first();
                $assignatures->alumne_id =  $id_alumne;
                $assignatures->actitud_1 =  ($request->input('actitud_1_' . $assignatura_id)) ? $assignatures->actitud_1 = $request->input('actitud_1_' . $assignatura_id) : $assignatures->actitud_1 = 5;
                $assignatures->actitud_2 =  ($request->input('actitud_2_' . $assignatura_id)) ? $assignatures->actitud_2 = $request->input('actitud_2_' . $assignatura_id) : $assignatures->actitud_2 = 5;
                $assignatures->actitud_3 =  ($request->input('actitud_3_' . $assignatura_id)) ? $assignatures->actitud_3 = $request->input('actitud_3_' . $assignatura_id) : $assignatures->actitud_3 = 5;
                $assignatures->esforc_1 =   ($request->input('esforc_1_' . $assignatura_id)) ? $assignatures->esforc_1 = $request->input('esforc_1_' . $assignatura_id) : $assignatures->esforc_1 = 5;
                $assignatures->esforc_2 =   ($request->input('esforc_2_' . $assignatura_id)) ? $assignatures->esforc_2 = $request->input('esforc_2_' . $assignatura_id) : $assignatures->esforc_2 = 5;
                $assignatures->esforc_3 =   ($request->input('esforc_3_' . $assignatura_id)) ? $assignatures->esforc_3 = $request->input('esforc_3_' . $assignatura_id) : $assignatures->esforc_3 = 5;
                $assignatures->treball_1 =  ($request->input('treball_1_' . $assignatura_id)) ? $assignatures->treball_1 = $request->input('treball_1_' . $assignatura_id) : $assignatures->treball_1 = 5;
                $assignatures->treball_2 =  ($request->input('treball_2_' . $assignatura_id)) ? $assignatures->treball_2 = $request->input('treball_2_' . $assignatura_id) : $assignatures->treball_2 = 5;
                $assignatures->treball_3 =  ($request->input('treball_3_' . $assignatura_id)) ? $assignatures->treball_3 = $request->input('treball_3_' . $assignatura_id) : $assignatures->treball_3 = 5;
                $assignatures->deures_1 =   ($request->input('deures_1_' . $assignatura_id)) ? $assignatures->deures_1 = $request->input('deures_1_' . $assignatura_id) : $assignatures->deures_1 = 5;
                $assignatures->deures_2 =   ($request->input('deures_2_' . $assignatura_id)) ? $assignatures->deures_2 = $request->input('deures_2_' . $assignatura_id) : $assignatures->deures_2 = 5;
                $assignatures->deures_3 =   ($request->input('deures_3_' . $assignatura_id)) ? $assignatures->deures_3 = $request->input('deures_3_' . $assignatura_id) : $assignatures->deures_3 = 5;
                $assignatures->adaptats =   ($request->input('adaptats_' . $assignatura_id)) ? $assignatures->adaptats = $request->input('adaptats_' . $assignatura_id) : $assignatures->adaptats = 2;
                $assignatures->qualificacio_1 = ($request->input('qualificacio_1_' . $assignatura_id)) ? $assignatures->qualificacio_1 = $request->input('qualificacio_1_' . $assignatura_id) : $assignatures->qualificacio_1 = 5;
                $assignatures->qualificacio_2 = ($request->input('qualificacio_2_' . $assignatura_id)) ? $assignatures->qualificacio_2 = $request->input('qualificacio_2_' . $assignatura_id) : $assignatures->qualificacio_2 = 5;
                $assignatures->qualificacio_3 = ($request->input('qualificacio_3_' . $assignatura_id)) ? $assignatures->qualificacio_3 = $request->input('qualificacio_3_' . $assignatura_id) : $assignatures->qualificacio_3 = 5;
                $assignatures->comentari_1 = ($request->input('comentari_1_' . $assignatura_id)) ? $assignatures->comentari_1 = $request->input('comentari_1_' . $assignatura_id) : $assignatures->comentari_1 = 5;
                $assignatures->comentari_2 = ($request->input('comentari_2_' . $assignatura_id)) ? $assignatures->comentari_2 = $request->input('comentari_2_' . $assignatura_id) : $assignatures->comentari_2 = 5;
                $assignatures->comentari_3 = ($request->input('comentari_3_' . $assignatura_id)) ? $assignatures->comentari_3 = $request->input('comentari_3_' . $assignatura_id) : $assignatures->comentari_3 = 5;
                $assignatures->comentari_4 = ($request->input('comentari_4_' . $assignatura_id)) ? $assignatures->comentari_4 = $request->input('comentari_4_' . $assignatura_id) : $assignatures->comentari_4 = 5;                
                $assignatures->observacions = ($request->input('observacionsNotes_' . $assignatura_id)) ? $assignatures->observacions = $request->input('observacionsNotes_' . $assignatura_id) : $assignatures->observacions = '';
                $assignatures->save();
                
                //Canviar de assignatura
                $assignatura_id++;
            }
        }

        return redirect("alumnes/formulari/" . $request->id)->with('message', 'Notes de l\'alumne/a actualitzades correctament');
    }

}

// FINAL DE LA CLASE
