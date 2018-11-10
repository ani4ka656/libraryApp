<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name','birth_date','origin','biography', 'number_of_books',

    ];
    public function books(){
    	return $this->hasMany('App\Book');
    }
    public function sortByBooksCount(){
        $authorBooksCount = Author::with('number_of_books')->get()->sortBy(function($author)
        {
            return $author->number_of_books->count();
        });
    }


}
