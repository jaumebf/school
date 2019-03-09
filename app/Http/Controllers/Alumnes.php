<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumne;

class Alumnes extends Controller
{
    //LLISTAR
    public function llistat(){
        //$llistat = \App\Product::all(); TOTS
        $llistat = Alumne::paginate(12);
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
        return redirect('alumnes/llistat')->with('message','Alumne modificat correctament');
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
        return redirect('alumnes/llistat')->with('message','Alumne afegit correctament');
    }  
    
    
}// FINAL DE LA CLASE
