@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            {{__(header('Refresh: 1; '))}}
        @endif

        <div class="col-md-8">
            <div class="card ajurounded">
                <div class="card-header">{{ __('Setting') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('userSetting.post') }}">
                        @csrf

                        <div class="form-group row ">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                    type="text"
                                    class="form-control ajurounded @error('name') is-invalid @enderror"
                                    name="name"
                                    value="@if( old('name') )
                                        {{old('name')}}
                                    @else
                                        {{Auth::user()->name}}
                                    @endif
                                    "
                                    required autocomplete="name"
                                    autofocus
                                >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input  id="tel"
                                    type="text"
                                    class="form-control ajurounded @error('tel') is-invalid @enderror"
                                    name="tel"
                                    value="@if( old('tel') )
                                        {{old('tel')}}
                                    @else
                                        {{ Auth::user()->tel }}
                                    @endif
                                    "
                                    required autocomplete="tel"

                                >

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Login E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email"
                                    type="email"
                                    class="form-control ajurounded @error('email') is-invalid @enderror"
                                    name="email"
                                    value="@if( old('email') )
                                        {{ old('email') }}
                                    @else
                                        {{ Auth::user()->email }}
                                    @endif
                                    "
                                    required
                                    autocomplete="email"
                                >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ajurounded">
                                    {{ __('Modified') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    <div class="form-group row mb-0">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Change Your Password') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
