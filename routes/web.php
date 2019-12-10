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

Route::get('/play/{titulo}','MoviesController@play');
Route::get("/movies/all","MoviesController@index");
Route::get('/movies/create','MoviesController@create');
Route::post('/movies/create','MoviesController@store');
Route::get('/movies/{id}','MoviesController@show');
Route::get('/movies/edit/{id}','MoviesController@edit');
Route::post('/movies/edit/{id}','MoviesController@update');
Route::get('/movies/destroy/{id}','MoviesController@destroy');

//Route::post('/agregarAlCarrito','CarritoController@agregarProducto');
Route::post('/agregarAlCarrito',function(Request $request){
    $carrito = Carrito::where('user_id','7')->where('status','abierto');
    $carrito_id = $carrito->id;

    $relacion =  new Carrito_Producto;
    $relacion->product_id = $request->product_id;
    $relacion->carrito_id = $carrito_id;
    $relacion->save();
});

Route::get("/actors",'ActorController@index');