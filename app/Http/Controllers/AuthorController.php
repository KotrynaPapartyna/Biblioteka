<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
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

        $authors=Author::orderBy( $collumnName, $sortby)->paginate(5);

        return view('author.index', ['authors'=>$authors, 'collumnName'=>$collumnName, 'sortby'=>$sortby]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books= Book::all();
        return view ("author.create", ["books"=>$books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $books=Book::all();
        $books_count=$books->count();

        $author=new Author;

        $validateVar = $request->validate([

            'name' => 'required|min:6|max:225|alpha',
            'surname' => 'required|min:6|max:225|alpha',

            ]);

        $author->name=$request->name;
        $author->surname=$request->surname;
        //$type->task_id=$request->type_task_id;

        $author->save();

        return redirect()->route("author.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = $author->authorBooks;

        $books_count = $books->count();

        return view("author.show",["author"=>$author, "books"=> $books, "books_count" => $books_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $books=Book::all();
        return view("author.edit", ["author"=>$author, "books"=>$books]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validateVar = $request->validate([

            'name' => 'required|min:6|max:225|alpha',
            'surname' => 'required|min:6|max:225|alpha',

            ]);

        $author->name=$request->name;
        $author->surname=$request->surname;


        $author->save();

        return redirect()->route("author.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        // suskaiciuoja kiek knygu turi autorius
        $books_count = $author->authorBooks->count();

        // jeigu autorius turi bent viena knyga- turi neleisti istrinti
        if($books_count!=0) {
            return redirect()->route("author.index")->with('error_message','The Author cannot be deleted because he has a book');
        }

        $author->delete();
        return redirect()->route("author.index")->with('success_message','The Author was successfully deleted');

    }
}
