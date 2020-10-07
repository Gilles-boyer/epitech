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

        <div class="col-md-12">
            <div class="card ajurounded">
                <div class="card-body">
                    <p>votre image: </p>
                    <img src="{{asset('/storage/image/'.$product->image)}}" alt="{{$product->title}}" width="100"  height="100" >
                    <form action=" {{ route('modify.post') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row ">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title"
                                    type="text"
                                    class="form-control ajurounded @error('title') is-invalid @enderror"
                                    name="title"
                                    value="@if( old('name') )
                                        {{old('name')}}
                                    @else
                                        {{ trim($product->title) }}
                                    @endif"
                                    required
                                    autocomplete="title"
                                    autofocus
                                >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control ajurounded @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required>
                                    <option value ="{{ $product->product_id }}" selected> {{ $product->category->name }} </option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <select id="location" class="form-control ajurounded @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required>
                                    <option value ="{{ $product->location_id }}" selected> {{ $product->location->city }} </option>
                                    @foreach($location as $loc)
                                        <option value="{{ $loc->id }}"> {{ $loc->postalCode }} {{ $loc->city }}</option>
                                    @endforeach
                                </select>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ 'Description' }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control ajurounded @error('description') is-invalid @enderror" name="description"  required>
                                    @if(old('description'))
                                        {{ old('description') }}
                                    @else
                                        {{ trim($product->title) }}
                                    @endif
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="condition" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

                            <div class="col-md-6">
                                <select id="condition" class="form-control ajurounded @error('condition') is-invalid @enderror" name="condition" value="{{ old('condition') }}" required>
                                    <option value ="{{ $product->condition }}" selected> {{ $product->condition }} </option>
                                    <option value="new">New</option>
                                    <option value="Good">Good</option>
                                    <option value="Used">Used</option>
                                </select>
                                @error('condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price €') }}</label>

                            <div class="col-md-6">
                                <input id="price"
                                    type="text"
                                    class="form-control ajurounded @error('price') is-invalid @enderror"
                                    name="price"
                                    value="@if( old('price') )
                                    {{old('price')}}
                                    @else
                                    {{ trim($product->price) }}
                                    @endif"
                                    required
                                    autocomplete="price"
                                >

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control ajurounded @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" >

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button name="modify"
                                    type="submit"
                                    class="btn btn-primary ajurounded"
                                    value="{{ $product->id }}"
                                    >
                                    {{ __('Modified Ad') }}
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
