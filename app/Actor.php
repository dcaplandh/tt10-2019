<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{

    public function getLink(){
        return "<a href='/actors/".$this->id."'>".$this->first_name." ".$this->last_name."</a>";
    }

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
