<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books= Book::with('author')->orderBy('name', 'asc')->get();
        return view('books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('books.create', compact('books', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksRequest $request)
    {
        $book = new Book();

        $book->name = $request->name;
        $book->author_id = $request->author_id;
        $book->total_number_of_pages = $request->total_number_of_pages;
        $filename = $request->file('book_path')->getClientOriginalName();
        $path = public_path().'/download';
        $request->file('book_path')->move($path, $filename);
        $book->book_path = $filename;

        $book->save();

        return redirect()->route('books.index')->with('message', 'Success update!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBooksRequest $request, $id)
    {
        $book = Book::find($id);

        $book->name = $request->name;
        $book->author_id = $request->author_id;
        $book->total_number_of_pages = $request->total_number_of_pages;
        $filename = $request->file('book_path')->getClientOriginalName();
        $path = public_path().'/download';
        $request->file('book_path')->move($path, $filename);
        $book->book_path = $filename;

        $book->save();

         return redirect()->route('books.index')->with('message', 'Success update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
    public function download(Request $request, $id){

        $book = Book::find($id);
        $txt = "Book \n";
        $txt .= $book->id;
        $txt .= $book->book_path;
        $txt .= "is empty!";
        $response = new StreamedResponse();
        $response->setCallBack(function () use($txt) {
            echo $txt;
        });
        $disposition = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $book->book_path);
        $response->headers->set('Content-Disposition', $disposition);

        return $response;
    }
    
    
}
