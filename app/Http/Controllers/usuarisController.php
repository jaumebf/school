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
        $llistat = User::all();
        $llistat = User::orderBy('id')->paginate(12);
        return view('usuaris.llistatUsuaris')->with('usuaris',$llistat);              
    }
    
    public function altaUsuari(){
        return view('usuaris.alta');
    }
    
    public function afegirUsuari(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            ]); 
        
        $usuari = new User();
        $usuari->name = $request->name;
        $usuari->surname = $request->surname;
        $usuari->email = $request->email;
        $usuari->password = Hash::make($request->password);
        $usuari->role = $request->role;
        $usuari->save();
        
        return redirect('usuaris/llistat')->with('message','Usuari afegit correctament');
    }
    
    public function esborrarUsuari($id){
        $usuari = User::findOrFail($id);
        try{
            $usuari->delete();
            return redirect('/usuaris/llistat')
            ->with('status','Usuari esborrat');
            
        } catch (Exception $ex) {
            return redirect('/usuaris/llistat')
            ->with('status', "Usuari no s'ha pogut esborrar");
        }
    }
    
    public function canviarPassword(Request $request){    
        $request->validate([
                'password' => 'required|string|min:6',
            ]);   
        
        try{
            $usuari = User::findOrFail($request->id);
            $usuari->password = Hash::make($request->password);
            $usuari->save();
            
            return redirect('/usuaris/llistat')
            ->with('status','Password canviat');
            
        } catch (Exception $ex) {
            return redirect('/usuaris/llistat')
            ->with('status', "Password no s'ha pogut canviar");
        }
    }
    
    public function canviarRol($id){
        $usuari = User::findOrFail($id);
        try{
            $usuari = User::findOrFail($id);
            
            if ($usuari->role == 1)
                $usuari->role = 0;
            else
                $usuari->role = 1;
            
            $usuari->save();
            
            return redirect('/usuaris/llistat')
            ->with('status','Rol canviat');
            
        } catch (Exception $ex) {
            return redirect('/usuaris/llistat')
            ->with('status', "Rol no s'ha pogut canviar");
        }
    }
    
}