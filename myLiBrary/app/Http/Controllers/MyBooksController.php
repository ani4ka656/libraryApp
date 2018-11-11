<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Book;
use App\MyBook;
use App\Author;
class MyBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $mybooks = MyBook::where('user_id', $user)
               ->orderBy('speed', 'asc')->get();
 
         
        $books=Book::all();
     
        return view('mybooks.index' , compact('books','mybooks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $mybook = new MyBook();
        $mybook->user_id = $user;                
        $mybook->book_id = $request->book_id;
        $mybook->speed = 0;
        $mybook->pages_read = 0;
        $mybook->save();

        
        return redirect()->route('mybooks.index')->with('message', 'Success update!');  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
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
        $mybook =MyBook::findOrFail($id);
        return view('mybooks.edit', compact('mybook'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mybook = MyBook::findOrFail($id);
        $mybook->speed = $request->speed;                
        $mybook->pages_read = $request->pages_read;
        
        
        $mybook->save();
                       
        return redirect()->route('mybooks.index')->with('message', 'Success update!'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mybook = MyBook::find($id);
        $mybook->delete();
        return redirect()->route('mybooks.index')->with('message', 'BOOK deleted');
    }
}