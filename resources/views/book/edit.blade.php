@extends('layouts.app')

{{--VEIKIA--}}
@section("content")
    <div class="container">

        {{--zinute apie neuzpildytus laukus--}}
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


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT BOOK') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('book.update', [$book]) }}" enctype="multipart/form-data">
                            @csrf

                            {{--pavadinimas--}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Book title') }}</label>
                                <div class="col-md-6">
                                    <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                        @error('title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--isbn--}}
                            <div class="form-group row">
                                <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('Book isbn') }}</label>
                                <div class="col-md-6">
                                    <input id="isbn"type="text" class="form-control @error('isbn') is-invalid @enderror " value="{{ old('isbn') }}" name="isbn" autofocus>
                                        @error('isbn')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--pages--}}
                            <div class="form-group row">
                                <label for="pages" class="col-md-4 col-form-label text-md-right">{{ __('Book pages') }}</label>
                                <div class="col-md-6">
                                    <input id="pages"type="text" class="form-control @error('pages') is-invalid @enderror " value="{{ old('pages') }}" name="pages" autofocus>
                                        @error('pages')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--about--}}
                            <div class="form-group row">
                                <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('Book description') }}</label>

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

                            {{--Autoriaus parinkimas--}}
                            <div class="form-group row">
                                <label for="author_id" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="author_id">

                                        @foreach ($authors as $author)

                                            <option value="{{$author->id}}" @if($author->id == $book->autho_id) selected @endif >{{$author->name}} {{$author->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('SAVE') }}
                                    </button>
                                </div>
                            </div>
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
