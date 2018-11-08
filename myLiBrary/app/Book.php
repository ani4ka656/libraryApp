<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\MyBook;

class Book extends Model
{
      protected $fillable = [
        'name', 'author_id','total_number_of_pages',
    ];
     public function author(){
    	return $this->belongsTo('App\Author');
    }
     public function mybook(){
    	return $this->hasOne('App\MyBook');
    }
}
