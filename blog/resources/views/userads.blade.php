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
        <div class="col-md-10">

        <form  method="POST" action="{{ route('userads.post') }}">
                @csrf

                <div class="form-group row ">
                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <select id="category" class="form-control ajurounded @error('category') is-invalid @enderror" name="ads" value="{{ old('category') }}" required>
                            @foreach($product as $pro)
                                <option value="{{ $pro->id }}">
                                    {{ $pro->title }} ---- {{ $pro->category->name }} ---- {{ $pro->price }} €
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-md-2 offset-md-5">
                        <button value="modified" class="btn btn-primary ajurounded" style="width: 100%" type="submit" name="modified">
                            Modified
                        </button>
                    </div>

                    <div class="col-md-2 offset-md-0">
                        <button value = "delete" class="btn btn-primary ajurounded bg-danger" style="width: 100%" type="submit" name="delete">
                            Delete
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

