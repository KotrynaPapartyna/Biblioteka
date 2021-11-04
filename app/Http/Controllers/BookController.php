<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collumnName=$request->collumnname;
        $sortby=$request->sortby;


        if (!$collumnName && !$sortby) {
           $collumnName='id';
            $sortby='asc';
        }

        $books=Book::orderBy( $collumnName, $sortby)->paginate(5);

        return view('book.index', ['books'=>$books, 'collumnName'=>$collumnName, 'sortby'=>$sortby]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $authors= Author::all();

        return view("book.create", ["book"=>$book, "authors"=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $authors=Author::all();
        $author_count=$authors->count();

        $book=new Book();


        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'isbn' => 'required',
            'pages' => 'required',
            'about' => 'required',
            ]);


        $book->title=$request->title;
        $book->isbn=$request->isbn;
        $book->pages=$request->pages;
        $book->about=$request->about;
        $book->author_id = $request->author_id;

        $book->save();

            return redirect()->route("book.index");
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        $authors=$book->bookAuthors;

        return view("book.show",["book"=>$book, "authors"=> $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all()->sortBy("id", SORT_REGULAR, true);
        return view("book.edit", ["book"=>$book, "authors"=>$authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'isbn' => 'required',
            'pages' => 'required',
            'about' => 'required',
            ]);


        $book->title=$request->title;
        $book->isbn=$request->isbn;
        $book->pages=$request->pages;
        $book->about=$request->about;
        $book->author_id = $request->author_id;

        $book->save();

            return redirect()->route("book.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        $book->delete();
        return redirect()->route("book.index")->with('success_message','The Book was successfully deleted');
    }
}
