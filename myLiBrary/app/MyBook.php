<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyBook extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'speed', 'pages_read' ,
    ];
    public function book(){
    	return $this->belongsTo('App\Book');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
