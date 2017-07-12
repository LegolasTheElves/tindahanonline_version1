@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 ">
        <h1>User Profile</h1>
        <hr>
        <h2>My Orders</h2>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                   <h4>Date of Order: <span class="alert alert-success">{{$order->created_at}}</span></h4>
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        <span class="badge badge-danger">${{$item['price']}}</span> <strong>{{$item['item']['title']}}</strong> | {{$item['qty']}} Unit(s)
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer"><h4>Total payment: <span class="text-danger">${{$order->cart->totalPrice}}</span></h4></div>
        </div>
        @endforeach
    </div>
</div>
@endsection