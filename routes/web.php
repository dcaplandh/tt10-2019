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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuario/carrito',function(){
    echo "carrito";
})->name('carrito');
Route::get('/usuario/{nombre1}',function($nombre2){
    //return view('usuario')->with("nombre3",$nombre2);
    return view('usuario',compact('nombre2'));
});

