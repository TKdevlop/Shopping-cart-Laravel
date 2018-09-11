@extends('layouts/master')
@section('styles')
    <style>
        .containers{
            margin: 0 auto;;
            width:60%;
        }
        @media(max-width:768px){
            .containers{
            
            width:100%;
        }
       
        }
    </style>
@endsection
@section('title')
Laravel Shopping Cart
@endsection

@section('content')
<div class="containers">
    <h1>Cart:</h1>
    @if (Session::has('cart'))
    @if($totalPrice>0)
<ul class="collection">
    
    @foreach ($products as $product)
    <li class="collection-item avatar">
    <img src="{{ $product['item']->imagePath}}" alt="" class="circle">
           <span> <h6 class="title"><strong>{{ $product['item']->title}}</strong>
           <span class="hide-on-small-only"> &nbsp;&nbsp;&nbsp;</span><a href="{{ route('product/cart/increaseQty',['id'=> $product['item']->id]) }}" class="btn-floating btn-small btn green"><i class="material-icons">add</i></a>
           <span class="hide-on-small-only"> &nbsp;&nbsp;&nbsp;</span> <a href="{{ route('product/cart/decreaseQty',['id'=> $product['item']->id]) }}" class="btn-floating btn-small btn"><i class="material-icons">remove</i></a>
         <span class="hide-on-small-only"> &nbsp;&nbsp;&nbsp;</span><a href="{{ route('product/cart/deleteQty',['id'=> $product['item']->id]) }}" class="btn-floating btn-small btn red"><i class="material-icons">clear</i></a>
        </h6></span>
            <p class="secondary-content">PRICE: <strong>${{ $product['price']}}</strong> <br>
             QTY:<strong>{{ $product['qty']}} </strong> 
            </p>
       
          </li>

    @endforeach
  
    
    
    
  
</ul>
<div class="row">
   
        <div class="col center m4"> <h5>TotalQty: {{ $totalQty }}</h5></div>
        <div class="col center m4"> <h5>TotalPrice: ${{ $totalPrice }}</h5></div>
<a href='{{ route('checkout') }}' class="waves-effect waves-light btn-large col m4"><i class="material-icons right">done</i>Procced To Checkout</a>
        </div>
@else
        <h4>Your Cart is empty! <a href='{{ route('Product/index') }}' class="btn-flat">ShopNow!</a></h4>
@endif
@endif
</div>
@endsection