@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT AUTHOR') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                        <label for="author_id" class="col-sm-3 col-form-label" >{{ __('Author ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$author->id}}</p>
                        </div>
                    </div>

                    {{--autoriaus vardas--}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label" >{{ __('Author Name') }}</label>
                        <div class="col-md-6">
                            <p>{{$author->name}}</p>
                        </div>
                    </div>

                    {{--autoriaus pavarde--}}
                    <div class="form-group row">
                        <label for="surname" class="col-sm-3 col-form-label" >{{ __('Author surname') }}</label>
                        <div class="col-md-6">
                            <p>{{$author->surname}}</p>
                        </div>
                    </div>

                    {{--autoriaus knygos--}}
                    <div class="form-group row">
                        <label for="author_id" class="col-sm-3 col-form-label" >{{ __('Author Books')}}</label>
                        <div class="col-md-6">
                            <p>{{$author->authorBooks->count()}}</p>
                        </div>
                    </div>

                    <a class="btn btn-info" href="{{route('author.index') }}">Back To Authors List</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
