<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name','birth_date','origin','biography', 'number_in_stock',
    ];
     public function books(){
    	return $this->hasMany('App\Book');
    }
}
