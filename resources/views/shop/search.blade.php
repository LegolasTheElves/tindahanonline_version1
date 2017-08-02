@extends('layout.master')
@section('title')
    Online Shop
@endsection
@section('content')
<h1>Search result</h1>
    <div class="panel panel-primary">
	  <div class="panel-heading">Item management</div>
	  <div class="panel-body">
					@if($products->count())
						<h3><strong><i>Number of result:{{$products->count()}}</i></strong></h3>
                            @foreach($products->chunk(3) as $productChuck)
                            <div class="row">
                                 @foreach($productChuck as $key => $product)
                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <li class="badge">{{++$key}}</li>
                                  <img src="{{$product->imagePath}}" alt="Image" class="img-responsive"/>
                                  <div class="caption">
                                    <h3>{{$product->title}}</h3>
                                    <p class="description">Description: {{$product->description}}</p>
                                    <p class="description">Category: {{$product->category_name}}</p>
                                    <div class="pull-left price">${{$product->price}}</div>
                                    <div class="clearfix">
                                    <a href="{{route('product.AddToCart', ['id'=>$product->id])}}" class="btn btn-success pull-right " role="button">Add to Cart</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                 @endforeach
                            </div>
                                @endforeach
					@else
						<p>No record found</p>
					@endif
			{{ $products->render() }}
	  </div>
	</div>
@endsection