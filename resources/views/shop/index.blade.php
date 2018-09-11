@extends('layouts/master')

@section('title')
Laravel Shopping Cart
@endsection
@section('content')
@section('styles')
<style>
    .err{
        padding: 10px;
        background: rgba(0,255,0,0.5);
        border-radius: 5px;
    }
</style>
@endsection
<div class="container">
  @if(Session::has('success'))
    <div class="row">
      
        <div class="col s12 err">
        <p class="center">{{ Session::get('success') }}</p>
            
           
           </div>
    </div>
    @endif
  <div class="row">
  @foreach ($products as $product)
  <div class="col s12 m4 l3">
    
      <div class="card  product">
          <div class="card-image">
          <img src="{{ $product->imagePath }}">
           
          <a href="{{ route('product/add-to-cart',['id'=>$product->id]) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
          </div>
          <div class="card-content">
          <span class="card-title">{{ $product->title }}  - <strong>${{ $product->price }}</strong></span>
          <p>{{ $product->description }}</p>
          </div>
        </div>
    </div>
  @endforeach
   
  
  </div>
</div>
@endsection