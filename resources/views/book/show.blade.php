@extends('layouts.app')

@section('content')

{{--VEIKIA--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT BOOK') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                        <label for="book_id" class="col-sm-3 col-form-label" >{{ __('Book ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$book->id}}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label" >{{ __('Book title') }}</label>
                        <div class="col-md-6">
                            <p>{{$book->title}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="isbn" class="col-sm-3 col-form-label" >{{ __('Book isbn') }}</label>
                        <div class="col-md-6">
                            <p>{{$book->isbn}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pages" class="col-sm-3 col-form-label" >{{ __('Book pages') }}</label>
                        <div class="col-md-6">
                            <p>{{$book->pages}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="about" class="col-sm-3 col-form-label" >{{ __('Book description')}}</label>
                        <div class="col-md-6">
                            <p>{!!$book->about!!}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author_id" class="col-sm-3 col-form-label" >{{ __('Author Name and Surname')}}</label>
                        <div class="col-md-6">
                            <p>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} </p>
                        </div>
                    </div>

                    <a class="btn btn-info" href="{{route('book.index') }}">Back To Books List</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
