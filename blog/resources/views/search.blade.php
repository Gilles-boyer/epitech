@extends('layouts.app')

@section('content')

<div class="container-fluid align-items-center ml-4">

    <div class="container-fluid">
        <form class="form-inline mb-5 mt-2">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          <input class="form-control mr-lg-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
    @endif

    <div class="row">
        <div class="col-md-8">

            @foreach($products as $product)
                <div class="row border border-primary ml-2 mb-3 align-items-center">
                    <div class="col-md-6 contenant p-3">
                    <a  href="{{'show/'.$product->id}}"><img src="{{asset('/storage/image/'.$product->image)}}"
                        width="374"
                        height="150"
                        class="ajurounded"
                        alt="{{$product->title}}">
                    </a>
                    <div class="texte_centrer border border-primary">{{$product->price}} €</div>
                    </div>
                    <div class="col-md-5 ml-1">
                    <h3><a href="{{'show/'.$product->id}}" class="text-dark">{{$product->title}}</a><strong class="ml-3">{{$product->category->name}}</strong></h3>
                        <p class=" text-justify"> {{$product->description}} </p>
                    <h3>Par <em class="text-primary font-weight-bold">{{$product->user->name}}</em></h3>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

