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
use setasign\Fpdi\Fpdi;

require_once(base_path() . '/fpdf.php');

class Alumnes extends Controller {

    function exportarForm(Request $request) {
        $pdf = new Fpdi();
        $pdf->AddPage('P');
        $pdf->SetMargins(0, 0, 0, 0);

        $pdf->setSourceFile(base_path("resources/assets/template.pdf"));
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx, 7, 0, $pdf->getTemplateSize($tplIdx)['width'] * .92);

        $pdf->SetFont('Arial', 'BI', 10);
        
        /* DADES GENERALS */
        //Data del curs
        $pdf->SetXY(37 - strlen($request->input('data')), 34.2);
        $pdf->Write(5, $request->input('data'));
        
        //Avaluació
        $avaluacio = ["Primera avaluació", "Segona avaluació", "Tercera avaluació", ""];
        $pdf->SetXY(95 - strlen($avaluacio[$request->input('avaluacio')-1]), 34.2);
        $pdf->Write(5, iconv('UTF-8', 'windows-1252', $avaluacio[$request->input('avaluacio')-1]));
        
        //Nom i cognom
        $pdf->SetXY(44.2 - strlen($request->input('nom')), 43.62);
        $pdf->Write(5, $request->input('nom'));
        
        //Nivell
        $pdf->SetXY(30.2 - strlen($request->input('nivell')), 53.1);
        $pdf->Write(5, $request->input('nivell'));
        
        //Classe
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(50 - strlen($request->input('classe')), 53.1);
        $pdf->Write(5, $request->input('nivell') . $request->input('classe'));

        
        /* ASPECTES PERSONALS */
        $pdf->SetFont('Arial', '', 15.5);
        $x = [133.8, 143.8, 153.8, 163.8, 173.8];
        
        //Motivació
        if ($request->input('motivacio') != 0){
            $pdf->SetXY($x[$request->input('motivacio')-1], 84.5);
            $pdf->Write(5,"X");
        }        
        //Concentració
        if ($request->input('concentracio') != 0){
            $pdf->SetXY($x[$request->input('concentracio')-1], 89.5);
            $pdf->Write(5,"X");
        }       
        //Agenda
        if ($request->input('agenda') != 0){
            $pdf->SetXY($x[$request->input('agenda')-1], 94.5);
            $pdf->Write(5,"X");
        }   
        //Relació
        if ($request->input('relacio') != 0){
            $pdf->SetXY($x[$request->input('relacio')-1], 99.45);
            $pdf->Write(5,"X");
        }   
        //Participació
        if ($request->input('participacio') != 0){
            $pdf->SetXY($x[$request->input('participacio')-1], 104.4);
            $pdf->Write(5,"X");
        }   
        //Relació professor
        if ($request->input('relacioprofesor') != 0){
            $pdf->SetXY($x[$request->input('relacioprofesor')-1], 109.35);
            $pdf->Write(5,"X");
        }   
        //Emocions
        if ($request->input('emocions') != 0){
            $pdf->SetXY($x[$request->input('emocions')-1], 114.25);
            $pdf->Write(5,"X");
        }   
        //Normes
        if ($request->input('normes') != 0){
            $pdf->SetXY($x[$request->input('normes')-1], 119.15);
            $pdf->Write(5,"X");
        }   
        //Comportament
        if ($request->input('comportament') != 0){
            $pdf->SetXY($x[$request->input('comportament')-1], 124.05);
            $pdf->Write(5,"X");
        }   
        //Puntualitat
        if ($request->input('puntualitat') != 0){
            $pdf->SetXY($x[$request->input('puntualitat')-1], 128.95);
            $pdf->Write(5,"X");
        } 
        
        
        /* MESURES D'ATENCIÓ DIVERSITAT */
        //Cap mesura
        if(null == $request->input('ed_especial') && null == $request->input('acollida') && null == $request->input('suport_linguistic') &&
            null == $request->input('sep') && null == $request->input('vetllador') && null == $request->input('ed_especial')){
            $pdf->SetXY(60, 146);
            $pdf->Write(5,"X");
        }
        //Ed. especial
        if (null != $request->input('ed_especial')){
            $pdf->SetXY(69.2, 156.7);
            $pdf->Write(5,"X");
        }
        //Acollida
        if (null != $request->input('acollida')){
            $pdf->SetXY(69.2, 161.5);
            $pdf->Write(5,"X");
        }
        //Suport lingüístic
        if (null != $request->input('suport_linguistic')){
            $pdf->SetXY(69.2, 166.3);
            $pdf->Write(5,"X");
        }
        //SEP
        if (null != $request->input('sep')){
            $pdf->SetXY(69.2, 171);
            $pdf->Write(5,"X");
        }
        //Vetllador
        if (null != $request->input('vetllador')){
            $pdf->SetXY(69.2, 175.8);
            $pdf->Write(5,"X");
        }
        //Ed. especial
        if (null != $request->input('ed_especial')){
            $pdf->SetXY(69.2, 180.52);
            $pdf->Write(5,"X");
        }
        
        /* PLA INDIVUALITZAT */
        //Cap àrea
        if(null == $request->input('llengua') && null == $request->input('llengua_castellana') && null == $request->input('llengua_inglesa') &&
            null == $request->input('matematiques') && null == $request->input('cm_natural') && null == $request->input('cm_social') &&
            null == $request->input('ed_artistica') && null == $request->input('ed_fisica') && null == $request->input('religio') &&
            null == $request->input('valors')){
            $pdf->SetXY(141.9, 146);
            $pdf->Write(5,"X");
        }
        //FILA 1
        //Llengua
        if (null != $request->input('llengua')){
            $pdf->SetXY(112.9, 156.7);
            $pdf->Write(5,"X");
        }
        //Llengua castellana
        if (null != $request->input('llengua_castellana')){
            $pdf->SetXY(112.9, 161.5);
            $pdf->Write(5,"X");
        }
        //Llengua anglesa
        if (null != $request->input('llengua_inglesa')){
            $pdf->SetXY(112.9, 166.3);
            $pdf->Write(5,"X");
        }
        //Matemàtiques
        if (null != $request->input('matematiques')){
            $pdf->SetXY(112.9, 171);
            $pdf->Write(5,"X");
        }
        //CM Natural
        if (null != $request->input('cm_natural')){
            $pdf->SetXY(112.9, 175.8);
            $pdf->Write(5,"X");
        }
        //FILA 2
        //CM Social
        if (null != $request->input('cm_social')){
            $pdf->SetXY(165.9, 156.7);
            $pdf->Write(5,"X");
        }
        //Ed. artística
        if (null != $request->input('ed_artistica')){
            $pdf->SetXY(165.9, 161.5);
            $pdf->Write(5,"X");
        }
        //Ed. física
        if (null != $request->input('ed_fisica')){
            $pdf->SetXY(165.9, 166.3);
            $pdf->Write(5,"X");
        }
        //Religió
        if (null != $request->input('religio')){
            $pdf->SetXY(165.9, 171);
            $pdf->Write(5,"X");
        }
        //Valors
        if (null != $request->input('valors')){
            $pdf->SetXY(165.9, 175.8);
            $pdf->Write(5,"X");
        }
        
        
        /* LLENGUA CATALANA */
        
        
        
        $pdf->Output('I', 'example.pdf');
    }
    
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
                $assignatures->alumne_id = $id_alumne;
                $assignatures->actitud_1 = ($request->input('actitud_1_' . $assignatura_id)) ? $assignatures->actitud_1 = $request->input('actitud_1_' . $assignatura_id) : $assignatures->actitud_1 = 5;
                $assignatures->actitud_2 = ($request->input('actitud_2_' . $assignatura_id)) ? $assignatures->actitud_2 = $request->input('actitud_2_' . $assignatura_id) : $assignatures->actitud_2 = 5;
                $assignatures->actitud_3 = ($request->input('actitud_3_' . $assignatura_id)) ? $assignatures->actitud_3 = $request->input('actitud_3_' . $assignatura_id) : $assignatures->actitud_3 = 5;
                $assignatures->esforc_1 = ($request->input('esforc_1_' . $assignatura_id)) ? $assignatures->esforc_1 = $request->input('esforc_1_' . $assignatura_id) : $assignatures->esforc_1 = 5;
                $assignatures->esforc_2 = ($request->input('esforc_2_' . $assignatura_id)) ? $assignatures->esforc_2 = $request->input('esforc_2_' . $assignatura_id) : $assignatures->esforc_2 = 5;
                $assignatures->esforc_3 = ($request->input('esforc_3_' . $assignatura_id)) ? $assignatures->esforc_3 = $request->input('esforc_3_' . $assignatura_id) : $assignatures->esforc_3 = 5;
                $assignatures->treball_1 = ($request->input('treball_1_' . $assignatura_id)) ? $assignatures->treball_1 = $request->input('treball_1_' . $assignatura_id) : $assignatures->treball_1 = 5;
                $assignatures->treball_2 = ($request->input('treball_2_' . $assignatura_id)) ? $assignatures->treball_2 = $request->input('treball_2_' . $assignatura_id) : $assignatures->treball_2 = 5;
                $assignatures->treball_3 = ($request->input('treball_3_' . $assignatura_id)) ? $assignatures->treball_3 = $request->input('treball_3_' . $assignatura_id) : $assignatures->treball_3 = 5;
                $assignatures->deures_1 = ($request->input('deures_1_' . $assignatura_id)) ? $assignatures->deures_1 = $request->input('deures_1_' . $assignatura_id) : $assignatures->deures_1 = 5;
                $assignatures->deures_2 = ($request->input('deures_2_' . $assignatura_id)) ? $assignatures->deures_2 = $request->input('deures_2_' . $assignatura_id) : $assignatures->deures_2 = 5;
                $assignatures->deures_3 = ($request->input('deures_3_' . $assignatura_id)) ? $assignatures->deures_3 = $request->input('deures_3_' . $assignatura_id) : $assignatures->deures_3 = 5;
                $assignatures->adaptats = ($request->input('adaptats_' . $assignatura_id)) ? $assignatures->adaptats = $request->input('adaptats_' . $assignatura_id) : $assignatures->adaptats = 2;
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
