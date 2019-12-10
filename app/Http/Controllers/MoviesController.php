<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Movie::all();
        foreach($peliculas as $pelicula){
            echo $pelicula->title;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulo = $request->title;
        $premios = $request->awards;
        $rating = $request->rating;

        $nuevaPeli = new Movie;
        $nuevaPeli->title = $titulo;
        $nuevaPeli->awards = $premios;
        $nuevaPeli->rating = $rating;
        $nuevaPeli->save();

        return redirect("/movies/all");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Movie::find($id);
        dd($pelicula);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Movie::find($id);
        return view('movies.edit',compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $titulo = $request->title;
        $premios = $request->awards;
        $rating = $request->rating;

        $peli = Movie::find($id);
        $peli->title = $titulo;
        $peli->awards = $premios;
        $peli->rating = $rating;
        $peli->save();

        return redirect("/movies/all");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peli = Movie::find($id);
        $peli->delete();

        return redirect("/movies/all");
    }

    public function topTen(){
        $peliculas = Movie::orderBy('rating','desc')->limit(10)->get();
        dd($peliculas);
    }
}
