<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $bookTitle = $request->bookTitle; // pavadinimas
        $bookAuthor = $request->bookAuthor; //pagal autoriu

        $filterBooks = Book::all();
        $authors = Author::all();

        if($bookTitle) {
            //vykdoma filtracija sortable()
            $books = Book::sortable()->where('title', $bookTitle)->paginate(10); //sortable()
        } else if ($bookAuthor) {
            $books = Book::sortable()->where('author_id', $bookAuthor)->paginate(10); //sortable()
        }
        else {
            $books = Book::sortable()->paginate(10); //sortable()
        }

        return view("book.index",["books"=>$books, "authors"=>$authors, "filterBooks" => $filterBooks]);
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


    // visu Autoriu ir knygu sugeneravimas pdf
    public function generateStatisticsPdf()
    {
        $books=Book::all();
        $booksCount=$books->count();

        $authors=Author::all();
        $authorsCount=$authors->count();

        // i vaizda perduodami visi autoriai, visos knugos, t.y. tiek kiek yra, kiek suskaiciavo
        view()->share(["booksCount" => $booksCount, 'authorsCount' => $authorsCount]);
        $pdf=PDF::loadView('pdf_template', $books);

        return $pdf->download("statistics.pdf");
    }

    // vienos Book PDF generavimas
    public function generateBookPDF(Book $book, Author $author) {

        view()->share('book', $book, "author", $author);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_book_template", $book, $author);

        return $pdf->download("book".$book->id.".pdf");
    }

    // visu Book PDF generavimas
    public function generatePDF() {

        $books = Book::all();

        $authors = Author::all();


        $books = Book::all();

        $booksCount = $books->count(); // 30
        $authorsCount = $authors->count(); // 30

        view()->share(['books', $books, "booksCount" => $booksCount, "authorsCount" => $authorsCount]);

        $pdf = PDF::loadView("pdf_templateB", $books);

        // galima pervadinti failo pavadinimus
        return $pdf->download("books.pdf");

    }


}
