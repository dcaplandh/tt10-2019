<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //protected $table = "movies";
    //protected $id = "identificador";
    protected $guarded = [];

    public function decirFecha(){
        echo "La fecha de estreno es ".$this->release_date;
    }

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

}
