@extends('layouts.app')

@section('title')
    Article
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container">
		<div class="card ajurounded">
			<div class="container-fliud">
				<div class="wrapper row align-items-center">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
                        <div class="tab-pane active " id="pic-1"><img class="ajurounded" src="{{asset('/storage/image/'.$product->image)}}" width="500"  height="400"/></div>
                        </div>
					</div>
					<div class="details col-md-6">
                    <h3 class="product-title">{{$product->title}}  <strong class = "ml-4"> {{ $product->category->name }}</strong></h3>
						<p class="product-description">{{$product->description}}</p>
						<h4 class="price"><span>{{$product->price }} €</span></h4>
						<div class="action">
                            <p>Etat : {{$product->condition}}</p>
							<button class="btn bg-info text-white btn-default" type="button">CONTACT</button>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
