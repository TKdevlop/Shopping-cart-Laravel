@extends('layouts/master')
@section('title')
Laravel Shopping Cart
@endsection
@section('content')

<div class="container">
        <h3>User Profile:</h3>
        <hr>
        <h3>My Orders:</h3>
                <div class="row">
                                <div class="col s12 m6 offset-m3">
                                        @foreach ($orders as $order)
                                        <div class="card-panel">
                                                        <ul class="collection with-header">
                                                                @foreach ($order->cart->items as $item)
                                                        <li class="collection-item"><div>{{$item['item']['title'] }} | QTY: {{ $item['qty']}}<a class="secondary-content"> <span class="new badge" data-badge-caption="{{ $item['item']['price'] }}"></span></a></div></li>
                                                                @endforeach
                                                                        
                        
                                                        <li class="collection-header grey lighten-1"><strong>Total Price: {{ $order->cart->totalPrice}}</strong></li>
                                                                      </ul>
                                        
                                          </div>     
                                        @endforeach
                                 
                                </div>
                              </div>
</div>
        @endsection