@extends('layout.master')
@section('title')
    Online Shop
@endsection
@section('content')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tanan imo taghanap jaun dre</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Mobile Phone</a></li>
      <li><a href="#">Tablets</a></li>
      <li><a href="#">Laptop & Computer</a></li>
    </ul>
  </div>
</nav>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>

<div class="row">
    <div class="col-sm-8">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img id="imgcarousel" src="{{ URL::to('images/flat.jpg') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Chania">
                </div>

                <div class="item">
                    <img id="imgcarousel" src="{{ URL::to('images/window_tab.png') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Chania">
                </div>

                <div class="item">
                    <img id="imgcarousel" src="{{ URL::to('images/bb.jpg') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Flower">
                </div>

                <div class="item">
                    <img id="imgcarousel" src="{{ URL::to('images/slider1.jpg') }}" class="img-responsive" style="height: 540px;
     width: 100%;
     overflow: hidden;" alt="Flower">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <a href=""><img src="{{ URL::to('images/iphone_7.jpg') }}" style="height: 250px;
     width: 100%;
     overflow: hidden;" /></a>
       <hr>
        <a href=""><img src="{{ URL::to('images/lg4k.jpg') }}" style="height: 250px;
     width: 100%;
     overflow: hidden;" /></a>
    </div>

</div>
    <hr>
   @if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
    @endif
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
        <a href="{{route('product.AddToCart', ['id'=>$product->id])}}" class="btn btn-success pull-right " role="button">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>
     @endforeach
</div>
    @endforeach

@endsection
