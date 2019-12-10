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

}
