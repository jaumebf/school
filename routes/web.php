<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Admin
Route::middleware(['isAdmin'])->group(function() {
    //Alumnes
    Route::get('/alumnes/alta/', 'Alumnes@alta');
    Route::post('/alumnes/afegir/', 'Alumnes@afegirAlumne');
    Route::get('/alumnes/esborrar/{codi}', 'Alumnes@esborrar')->where('codi', '[0-9]+');
    Route::get('/alumnes/actualitzar/{codi}', 'Alumnes@actualitzar')->where('codi', '[0-9]+');
    Route::post('alumnes/actualitzar/', 'Alumnes@modificar');

    //Usuaris
    Route::get('/usuaris/llistat', 'usuarisController@llistarUsuaris');
    Route::get('/usuaris/alta', 'usuarisController@altaUsuari');
    Route::post('/usuaris/alta', 'usuarisController@afegirUsuari');
    Route::post('/usuaris/llistat', 'usuarisController@canviarPassword');
    Route::get('/usuaris/canviarRol/{codi}', 'usuarisController@canviarRol')->where('codi', '[0-9]+');
    Route::get('/usuaris/esborrar/{codi}', 'usuarisController@esborrarUsuari')->where('codi', '[0-9]+');    
});

//Alumnes
Route::get('/alumnes/', 'Alumnes@llistat');
Route::get('/alumnes/llistat/', 'Alumnes@llistat');
Route::post('/filtratge','Alumnes@filtre');
Route::get('/alumnes/filtrats/','Alumnes@llistatNormal');

//Notes
Route::get('/alumnes/formulari/{codi}', 'Alumnes@actualitzarForm')->where('codi', '[0-9]+');
Route::post('/alumnes/formulari/', 'Alumnes@modificarForm');
Route::post('/alumnes/formulari/pdf', 'Alumnes@exportarForm');

/*Route::get('/alumnes/alta/', 'Alumnes@alta');
Route::post('/alumnes/afegir/', 'Alumnes@afegirAlumne');
Route::get('/alumnes/esborrar/{codi}', 'Alumnes@esborrar')->where('codi', '[0-9]+');
Route::get('/alumnes/actualitzar/{codi}', 'Alumnes@actualitzar')->where('codi', '[0-9]+');


//Usuaris
Route::get('/usuaris/llistat', 'usuarisController@llistarUsuaris');
Route::get('/usuaris/alta', 'usuarisController@altaUsuari');
Route::post('/usuaris/alta', 'usuarisController@afegirUsuari');
Route::post('/usuaris/', 'usuarisController@canviarPassword');
Route::get('/usuaris/canviarRol/{codi}', 'usuarisController@canviarRol')->where('codi', '[0-9]+');
Route::get('/usuaris/esborrar/{codi}', 'usuarisController@esborrarUsuari')->where('codi', '[0-9]+');

//Pla Individualtzat
Route::get('/alumnes/plaindividualitzat/{codi}', 'PlaIndividualitzat@actualitzar')->where('codi', '[0-9]+');
Route::post('/alumnes/plaindividualitzat/', 'PlaIndividualitzat@modificar');
Route::get('/plaindividualitzat/afegir/{codi}', 'PlaIndividualitzat@afegir')->where('codi', '[0-9]+');

//Atenció diversitat
Route::get('/alumnes/atenciodiversitat/{codi}', 'AtencioDiversitat@actualitzar')->where('codi', '[0-9]+');
Route::post('/alumnes/atenciodiversitat/', 'AtencioDiversitat@modificar');
Route::get('/atenciodiversitat/afegir/{codi}', 'AtencioDiversitat@afegir')->where('codi', '[0-9]+');

//Aspectes personals
Route::get('/alumnes/aspectespersonals/{codi}', 'AspectesPersonals@actualitzar')->where('codi', '[0-9]+');
Route::post('/alumnes/aspectespersonals/', 'AspectesPersonals@modificar');
Route::get('/aspectespersonals/afegir/{codi}', 'AspectesPersonals@afegir')->where('codi', '[0-9]+');*/




