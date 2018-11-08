<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
          protected $fillable = [
        'name','birth_date','origin','biography',
    ];
     public function Books(){
    	return $this->hasMany('App\Book');
    }
}
