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

        <form  method="POST" action="{{ route('location.post')}}">
                @csrf

                <div class="form-group row ">
                    <label for="postalCode" class="col-md-4 col-form-label text-md-right">{{ __(	'Postal Code') }}</label>

                    <div class="col-md-4">
                        <input id="postalCode" type="text" class="form-control ajurounded @error('postalCode') is-invalid @enderror" name="postalCode" value="{{ old('postalCode') }}" required autocomplete="postalCode" autofocus>

                        @error('postalCode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row ">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __(	'City') }}</label>

                    <div class="col-md-4">
                        <input id="city" type="text" class="form-control ajurounded @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-4 offset-md-4">
                        <button class="btn btn-primary ajurounded" style="width: 100%" type="submit" name="action">
                            Create Location
                          </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

