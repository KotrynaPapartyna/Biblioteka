@extends('layouts.app')

@section('content')

<div class="container">

    {{--error zinute jeigu negalima istrinti--}}
    @if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{session()->get("error_message")}}
    </div>
    @endif

    {{--sekmingo istrynimo zinute--}}
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('AUTHORS') }}</div>

    {{--MYGTUKU LAUKAS--}}
    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('author.create') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">CREATE NEW AUTHOR</button>
                </form>
            </th>


        {{--KNYGU MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('book.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL BOOKS LIST</button>
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


    <table class="table table-striped table-hover table-sm">
        <tr>

            <tr class="table-secondary">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('surname', 'Surname' )</th>
            </tr>


        @foreach ($authors as $author)

                <td> {{$author->id }}</td>
                <td> {{$author->name}}</td>
                <td> {{$author->surname}}</td>

                    <td>
                        <th><a class="btn btn-warning" href="{{route('author.show', [$author]) }}">Show</a></th>
                        <th><a class="btn btn-info" href="{{route('author.edit', [$author]) }}">Edit</a></th>

                        <th>
                        <form method="POST" action="{{route('author.destroy', [$author]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </th>
                    </td>
        </tr>

        @endforeach

            </table>

                {{--puslapiu atvaizdavimas puslapio apacioje --}}
               {!! $authors->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

</div>



@endsection
