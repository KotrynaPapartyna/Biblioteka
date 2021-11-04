@extends('layouts.app')

@section('content')

{{--VEIKIA--}}

<div class="container">


    @if ($errors->any())
    {{-- klaidu bus daugau nei 1 --}}

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif



    @error('author_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW BOOK') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">

                        {{--Pavadinimas--}}
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label" >{{ __('Book Title') }}</label>
                            <div class="col-md-6">
                                <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--ISBN--}}
                        <div class="form-group row">
                            <label for="isbn" class="col-sm-3 col-form-label" >{{ __('Book ISBN') }}</label>
                            <div class="col-md-6">
                                <input id="isbn"type="text" class="form-control @error('isbn') is-invalid @enderror " value="{{ old('isbn') }}" name="isbn" autofocus>
                                @error('isbn')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                          {{--puslapiai--}}
                        <div class="form-group row">
                            <label for="pages" class="col-sm-3 col-form-label" >{{ __('Book Pages') }}</label>
                            <div class="col-md-6">
                                <input id="pages"type="text" class="form-control @error('pages') is-invalid @enderror " value="{{ old('pages') }}" name="pages" autofocus>
                                @error('pages')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                          {{--aprasymas- about--}}
                        <div class="form-group row">
                            <label for="about" class="col-sm-3 col-form-label">{!!'Book description'!!}</label>

                            <div class="col-md-6">
                                <textarea class="form- control summernote" name="about" required>

                                </textarea>
                                        @error('about')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>

                          {{--autoriaus parinkimas--}}
                        <div class="form-group row">
                            <label for="author_id" class="col-sm-3 col-form-label">{{ __('Author') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="author_id">

                                    @foreach ($authors as $author)

                                        <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif >{{$author->name}} {{$author->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        </div>

                        <button class="btn btn-info" type="submit">Save new Book</button>

                        @csrf

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
    $('.summernote').summernote();
    });
</script>

@endsection
