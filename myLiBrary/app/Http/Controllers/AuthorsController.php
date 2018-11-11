<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('number_of_books', 'desc')->get();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('authors.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = new Author();

        $author->name = $request->name;
        $author->birth_date = $request->birth_date;
        $author->origin = $request->origin;
        $author->biography = $request->biography;
        $author->number_of_books = numberBetween($min = 0, $max = 100);

        $author->save();

        return redirect()->route('authors.index')->with('message', 'Success update!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $author = Author::findOrFail($id);

        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = Author::find($id);

        $author->name = $request->name;
        $author->birth_date = $request->birth_date;
        $author->origin = $request->origin;
        $author->biography = $request->biography;
        $author->number_of_books = numberBetween($min = 0, $max = 100);
        
        $author->save();

        return redirect()->route('authors.index')->with('message', 'Success update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('authors.index');
    }
    public function sortByBooksCount(){
        $sortedauthors= Author::with('number_of_books')->get()->sortBy(function($author)
        {
            return $author->number_of_books->count();
        });
    }
}
