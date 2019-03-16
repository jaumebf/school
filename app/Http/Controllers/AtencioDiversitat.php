<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atencio_diversitat;
use App\Alumne;

class AtencioDiversitat extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //ACTUALITZAR VEURE
    public function actualitzar($id){
        $atencio = Atencio_diversitat::findOrFail($id);
        return view('plaindividualitzat.atenciodiversitat')->with('atencio',$atencio);
    }
    
    //MODIFICAR
    public function modificar(Request $request){                
        $atencio = Atencio_diversitat::findOrFail($request->id);
        
        ($request->input('ed_especial')) ? $atencio->ed_especial = 1 : $atencio->ed_especial = 0;
        ($request->input('acollida')) ? $atencio->acollida = 1 : $atencio->acollida = 0;
        ($request->input('suport_linguistic')) ? $atencio->suport_linguistic = 1 : $atencio->suport_linguistic = 0;
        ($request->input('sep')) ? $atencio->sep = 1 : $atencio->sep = 0;
        ($request->input('vetllador')) ? $atencio->vetllador = 1 : $atencio->vetllador = 0;
        ($request->input('at_individual')) ? $atencio->at_individual = 1 : $atencio->at_individual = 0;
        $atencio->save();
        
        return redirect('alumnes/llistat')->with('message','Atenció diversitat actualitzat correctament');
    }
    
    public function afegir($id){       
        $alumne = Alumne::findOrFail($id);        

        $atencio = new Atencio_diversitat();
        $atencio->alumne_id = $id;
        $atencio->ed_especial = 0;
        $atencio->acollida = 0;
        $atencio->suport_linguistic = 0;
        $atencio->sep = 0;
        $atencio->vetllador = 0;
        $atencio->at_individual = 0;
        $atencio->save();
        
        return redirect('/aspectespersonals/afegir/'.$alumne->id);

    }
}
