<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\User;

class usuarisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function llistarUsuaris(){
        //$llistat = \App\Product::all(); TOTS
        $llistat = \App\User::paginate(7);
        return view('usuaris.llistatUsuaris')->with('usuaris',$llistat);              
    }
    
    public function esborrarUsuari($id){
        $usuari = User::findOrFail($id);
        try{
            $usuari->delete();
            return redirect('/usuaris')
            ->with('status','Usuari esborrat');
            
        } catch (Exception $ex) {
            return redirect('/usuaris')
            ->with('status', "Usuari no s'ha pogut esborrar");
        }
    }
    
    public function canviarPassword(Request $request){    
        $request->validate([
            'password' => 'required'
            ]);   
        
        try{
            $usuari = User::findOrFail($request->id);
            $usuari->password = Hash::make($request->password);
            $usuari->save();
            
            return redirect('/usuaris')
            ->with('status','Password canviat');
            
        } catch (Exception $ex) {
            return redirect('/usuaris')
            ->with('status', "Password no s'ha pogut canviar");
        }
    }
    
    public function canviarRol($id){
        $usuari = User::findOrFail($id);
        try{
            $usuari = User::findOrFail($id);
            
            if ($usuari->rol == 1)
                $usuari->rol = 0;
            else
                $usuari->rol = 1;
            
            $usuari->save();
            
            return redirect('/usuaris')
            ->with('status','Rol canviat');
            
        } catch (Exception $ex) {
            return redirect('/usuaris')
            ->with('status', "Rol no s'ha pogut canviar");
        }
    }
    
}