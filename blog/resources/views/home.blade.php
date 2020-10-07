@extends('layouts.app')

@section('content')




        <form class="form-row align-items-center ml-4"  method="post" action="{{ route('search.post') }}">
            @csrf
            <div class="form-group col-md-1 ml-4">
            <button class="btn  my-2 my-sm-0" type="submit">
                <img src="{{ asset('../image/search.png')}}" alt="logo loupe" height="40" width="40">
            </button>
            </div>
          <input name = "search" class="form-control bordernone col-md-7" type="search" aria-label="Search">
        </form>

<div class="container-fluid align-items-center ml-4">
    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
    @endif

    <div class="row ">

        <div class="col-lg-3 border border-primary p-3 ">
            <div class="bg-light" >
                <p><strong class="ml-3">FILTER BY</strong></p>
                <P>Category</P>
                <div class="dropdown mt-4">
                    <button class="btn dropdown-toggle border border-primary btn-lg btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      all
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($category as $cat)
                            <a class="dropdown-item" href="search\cat\{{$cat->id}}">{{$cat->name}}</a>
                        @endforeach
                    </div>
                </div>
                <p class="mt-3">Location</p>
                <div class="dropdown mt-4">
                    <button class="btn dropdown-toggle border border-primary btn-lg btn-block " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Location
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($location as $loc)
                            <a class="dropdown-item" href="search\location\{{$loc->id}}">{{$loc->city}} -- {{$loc->postalCode}}</a>
                        @endforeach
                    </div>
                </div>
                <p class="mt-3">Price Range</p>
                <div class="row col-11 mt-4 justify-content-between">

                    <input type="text" class="col-md-5 border border-primary btn-lg" placeholder="min">


                        <input type="text" class="col-md-5 border border-primary btn-lg" placeholder="max">

                </div>

                <p class="mt-4">Condition</p>
                <nav aria-label="...">
                    <ul class="pagination pagination-lg flex-column text-center">
                      <li class="page-item active mt-3" aria-current="page">
                        <span class="page-link border border-primary">
                          New
                          <span class="sr-only">(current)</span>
                        </span>
                      </li>
                      <li class="page-item mt-3 "><a class="page-link border border-primary" href="#">Good</a></li>
                      <li class="page-item mt-3 "><a class="page-link border border-primary" href="#">Used</a></li>
                    </ul>
                </nav>
            </div>
        </div>

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

