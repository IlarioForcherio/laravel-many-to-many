<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    //relazione con la tabella posts
    public function posts(){
        //relazione uno a molti
        //hasMany-> ha  piu' post associati(modelli)
        return $this->hasMany('App\Model\Post');
    }
}
