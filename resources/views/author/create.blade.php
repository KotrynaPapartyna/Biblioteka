@extends('layouts.app')

@section('content')


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
                <div class="card-header">{{ __('CREATE NEW AUTHOR') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">

                        {{--Vardas--}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label" >{{ __('Author Name') }}</label>
                            <div class="col-md-6">
                                <input id="name"type="text" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}" name="name" autofocus>
                                @error('name')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--Pavarde--}}
                        <div class="form-group row">
                            <label for="surname" class="col-sm-3 col-form-label" >{{ __('Author surname') }}</label>
                            <div class="col-md-6">
                                <input id="surname"type="text" class="form-control @error('surname') is-invalid @enderror " value="{{ old('surname') }}" name="surname" autofocus>
                                @error('surname')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                        <button class="btn btn-info" type="submit">Save new Author</button>

                        @csrf

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>



@endsection
