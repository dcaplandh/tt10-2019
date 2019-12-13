<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;
use App\Actor_Movie;
use App\Genre;

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
        $reglas = [
            "title" => "required|max:40|alpha",
            "awards" => "required|integer|min:0",
            "rating" => "required|numeric|min:0|max:10"
        ];
        $mensajes = [
            "title.required" => "El titulo es obligatorio",
            "awards.required" => "Pone la cantidad de premios",
            "rating.required" => "El rating es obligatorio",
            "min" => "",
            "max" => "",
            "numeric" => ""
        ];
        //validacion
        $this->validate($request,$reglas,$mensajes);

        if($request->file('poster')){
            $basename  = $request->file('poster')->store('posters');
        }else{
            $basename = "posters/default.png";
        }
        $titulo = $request->title;
        $premios = $request->awards;
        $rating = $request->rating;

        $nuevaPeli = new Movie;
        $nuevaPeli->title = $titulo;
        $nuevaPeli->awards = $premios;
        $nuevaPeli->rating = $rating;
        $nuevaPeli->poster = $basename;
        $nuevaPeli->release_date = "2019-12-10 19:33:11";
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

        if($request->file('poster')){
            $basename  = $request->file('poster')->store('posters');
        }else{
            $basename = $peli->poster;
        }
        
        $peli->title = $titulo;
        $peli->awards = $premios;
        $peli->rating = $rating;
        $peli->poster = $basename;
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

    public function relaciones(){
        /*$leo = Actor::where("first_name","Leonardo")->where("last_name","Di Caprio")->get();
        $peliculas = Actor_Movie::where("actor_id",$leo[0]->id)->get();
        dd($peliculas);
        foreach($peliculas)
        */
        /*$actor = Actor::find(15);
        foreach($actor->movies as $peli){
            echo $peli->title;
            echo "<br>";
        }
        */
        $pelicula = Movie::find(4);
        dd($pelicula->actors);
        
        
        
    }

    public function genre(){
        $movie = Movie::find(2);
        dd($movie->genre->movies);
    }

    public function todas(){
        $peliculas = Movie::all();
        return view("movies.todas",compact('peliculas'));
    }
}
