
@extends('layouts.app')


@section("content")
    <div class="container">

        {{--klaidos zinutes isvedimas--}}
        @if ($errors->any())
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
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT AUTHOR') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('author.update', [$author]) }}" enctype="multipart/form-data">
                            @csrf

                            {{--vardas--}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('AUTHOR NAME') }}</label>
                                <div class="col-md-6">
                                    <input id="name"type="text" class="form-control @error('name') is-invalid @enderror " value="{{$author->name}}" name="name" autofocus>
                                        @error('name')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--pavarde- surname laukelis--}}
                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('AUTHOR NAME') }}</label>
                                <div class="col-md-6">
                                    <input id="surname"type="text" class="form-control @error('surname') is-invalid @enderror " value="{{$author->surname}}" name="surname" autofocus>
                                        @error('surname')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
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



@endsection
