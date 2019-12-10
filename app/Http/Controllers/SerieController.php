<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Serie::all();
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
        return view('series.create');
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

        $nuevaPeli = new Serie;
        $nuevaPeli->title = $titulo;
        $nuevaPeli->awards = $premios;
        $nuevaPeli->rating = $rating;
        $nuevaPeli->save();

        return redirect("/series/all");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Serie::find($id);
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
        $pelicula = Serie::find($id);
        return view('series.edit',compact('pelicula'));
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

        $peli = Serie::find($id);
        $peli->title = $titulo;
        $peli->awards = $premios;
        $peli->rating = $rating;
        $peli->save();

        return redirect("/series/all");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peli = Serie::find($id);
        $peli->delete();

        return redirect("/series/all");
    }
}
