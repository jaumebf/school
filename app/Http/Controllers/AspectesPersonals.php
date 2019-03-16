<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aspecte_personal;
use App\Alumne;

class AspectesPersonals extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    //ACTUALITZAR VEURE
    public function actualitzar($id) {
        $asP = Aspecte_personal::findOrFail($id);
        return view('accions.aspectespersonals')->with('asP', $asP);
    }

    //MODIFICAR
    public function modificar(Request $request) {
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

        return redirect('alumnes/llistat')->with('message', 'Aspectes personals de l\'alumne/a actualitzats correctament');
    }

    public function afegir($id) {
        $alumne = Alumne::findOrFail($id);
        $exist = Aspecte_personal::find($id);

        if (!$exist) {
            $asP = new Aspecte_personal();
            $asP->alumne_id = $id;
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
    }

}
