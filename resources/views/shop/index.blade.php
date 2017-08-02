@extends('layout.master')
@section('title')
    Online Shop
@endsection
@section('content')
@if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
    @endif
@include('partials.secondaryheader')
@include('partials.carousel')
    <hr>
    <h3><strong><i>All Products</i></strong></h3>
    @foreach($products->chunk(3) as $productChuck)
<div class="row">
     @foreach($productChuck as $product)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
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
{{$products->render()}}
<hr>
<h3><strong><i>Mobile Phone</i></strong></h3>
 @foreach($mobiles->chunk(3) as $productChuck)
<div class="row">
     @foreach($productChuck as $product)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
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
{{$products->render()}}
@endsection
