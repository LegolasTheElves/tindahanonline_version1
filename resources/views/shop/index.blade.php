@extends('layout.master')
@section('title')
    Online Shop
@endsection
@section('content')
    @foreach($products->chunk(3) as $productChuck)
<div class="row">
     @foreach($productChuck as $product)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{$product->imagePath}}" alt="Image" class="img-responsive"/>
      <div class="caption">
        <h3>{{$product->title}}</h3>
        <p class="description">{{$product->description}}</p>
        <div class="pull-left price">${{$product->price}}</div>
        <div class="clearfix">
        <a href="#" class="btn btn-success pull-right " role="button">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>
     @endforeach
</div>
    @endforeach

@endsection
