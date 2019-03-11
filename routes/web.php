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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Alumnes contolers
Route::get('/alumnes/llistat/','Alumnes@llistat');
Route::get('/alumnes/alta/','Alumnes@alta');
Route::post('/alumnes/afegir/','Alumnes@afegir');
Route::get('/alumnes/esborrar/{codi}','Alumnes@esborrar')->where('codi', '[0-9]+');
Route::get('/alumnes/actualitzar/{codi}','Alumnes@actualitzar')->where('codi', '[0-9]+');
Route::post('alumnes/actualitzar/','Alumnes@modificar');

//Pla Individualtzat
Route::get('/alumnes/plaindividualitzat/{codi}','PlaIndividualitzat@actualitzar')->where('codi', '[0-9]+');
Route::get('/plaindividualitzat/afegir/{codi}','PlaIndividualitzat@afegir')->where('codi', '[0-9]+');



