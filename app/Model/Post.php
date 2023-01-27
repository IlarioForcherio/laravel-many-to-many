<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
      'title',
      'body',
      'category_id',
    ];

    //relazione con la tabella categories
    public function category(){
        // relazione molti a uno
        //una solca categoria associata
        return $this->belongsTo('App\Model\Category');
    }


    public function tags(){
        return $this->belongsToMany('App\Model\Tag');


    }

}
