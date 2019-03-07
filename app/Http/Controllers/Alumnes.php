<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumne;

class Alumnes extends Controller
{
    //LLISTAR
    public function llistar(){
        //$llistat = \App\Product::all(); TOTS
        $llistat = Alumne::paginate(15);
        return view('alumnes.llistat')->with('alumnes',$llistat);
              
    }
    
    //ESBORRAR
    public function esborrar($id){          
        $alumne = Alumne::findOrFail($id);
        $alumne->delete();
        
        return redirect('alumnes/llistat')->with('status','Producte esborrat correctament');
    }
    
    //ACTUALITZAR VEURE
    public function actualitzar($id){
        $alumne = Alumne::findOrFail($id);
        return view('alumnes.actualitzar')->with('alumne',$alumne);
    }
    
    //MODIFICAR
    public function modificar(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'course' => 'required|numeric|min:0',
            'dni' => 'required|min:0|max:8',
            'dob' => 'required|date|date_format:Y-m-d|after:yesterday',
            ]); 
        
        $alumne = Alumne::findOrFail($request->id);
        $alumne->name = $request->nom;
        $alumne->surname = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->course = $request->curs;
        $alumne->dob = $request->dob;
        $alumne->save();        
        return redirect('alumnes/llistat');
    }
    
    /*
    //ALTA MOSTRAR FORMULARI
    public function alta(){
        $categories = Categories::all();
        return view('productes.alta')->with('categories',$categories);
    }
    

    
    //AFEGIR
    public function afegir(Request $request){
        $request->validate([
            'nom' => 'required|max:10',
            'descripcio' => 'required',
            'preu' => 'required|numeric|min:0',
            'categoria' => 'nullable|exists:categories,id'
            ]); 
        
        $producte = new Product();
        $producte->nom = $request->nom;
        $producte->descripcio = $request->descripcio;
        $producte->preu = $request->preu;
        $producte->category_id = $request->categoria;        
        $producte->save();
        
        return redirect('productes/llistat');
    }*/
}
