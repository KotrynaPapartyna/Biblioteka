@extends('layouts.app')

@section('content')

<div class="container">


    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('BOOKS') }}</div>

    {{--MYGTUKU LAUKAS--}}
    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('book.create') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">CREATE NEW BOOK</button>
                </form>
            </th>


        {{--AUTHORS MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('author.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL AUTHORS LIST</button>
                </form>
            </th>

        {{--PAIESKOS FORMA
            <th>
                <form action="{{route("book.search")}}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="Enter searc key"/>
                    <button type="submit">SEARCH</button>
                </form>
            </th>--}}
        </tr>
    </table>

    {{--RIKIAVIMO FORMA--}}
    <form action="{{route('book.index')}}" method="GET">
        @csrf
        <select name="collumnname">

            {{--jeigu gautas kintamasis yra id- jis turi buti pazymetas--}}
            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
                {{--kitu atveju- jis nera pazymetas--}}
                @else
                <option value="id">ID</option>
            @endif


            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif

            @if ($collumnName == 'isbn')
                <option value="isbn" selected>ISBN</option>
            @else
                <option value="isbn">ISBN</option>
            @endif

            @if ($collumnName == 'pages')
                <option value="pages" selected>Pages</option>
            @else
                <option value="pages">Pages</option>
            @endif


            @if ($collumnName == 'author_id')
                <option value="author_id" selected>Author ID</option>
            @else
                <option value="author_id">Author ID</option>
            @endif
        </select>

        <select name="sortby">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>

        <button type="submit">SORT</button>

    </form>

    <table class="table table-striped table-hover table-sm">
        <tr>

            <tr class="table-secondary">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'TITLE')</th>
                <th>@sortablelink('isbn', 'isbn' )</th>
                <th>@sortablelink('pages', 'Pages' )</th>
                <th>About Books</th>
                <th>@sortablelink('author_id', 'Author Name and Surname' )</th>
            </tr>


        @foreach ($books as $book)

                <td> {{$book->id }}</td>
                <td> {{$book->title }}</td>
                <td> {{$book->isbn}}</td>
                <td> {{$book->pages}}</td>
                <td> {!!$book->about!!}</td>
                <td> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>


                    <td>
                        <th><a class="btn btn-warning" href="{{route('book.show', [$book]) }}">Show</a></th>
                        <th><a class="btn btn-info" href="{{route('book.edit', [$book]) }}">Edit</a></th>

                        <th>
                        <form method="POST" action="{{route('book.destroy', [$book]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </th>

                    </td>
        </tr>

        @endforeach


            </table>

               {!! $books->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

</div>



@endsection
