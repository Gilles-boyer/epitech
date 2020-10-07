@extends('layouts.app')

@section('content')

<div class="container-fluid align-items-center ml-4">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        {{__(header('Refresh: 1; '))}}
    @endif

    <div class="row">
        <div class="col-md-12">

        <form  method="POST" action="{{ route('create.category.post') }}">
                @csrf

                <div class="form-group row ">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                    <div class="col-md-4">
                        <input id="name" type="text" class="form-control ajurounded @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-4 offset-md-4">
                        <button class="btn btn-primary ajurounded" style="width: 100%" type="submit" name="action">
                            Create Category
                          </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

