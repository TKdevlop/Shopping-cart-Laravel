@extends('layouts/master')

@section('styles')
    <style>
    
@media(min-width:768px){
    .container{
        width:30%;
    }
   
}
    </style>
@endsection

@section('title')
Laravel Shopping Cart
@endsection
@section('content')

<div class="container">
<div class="row">
    <div class="col s12">
        <h2 class="center">Checkout:</h2>
        <ul class="collection with-header">
           
                <li class="collection-header"><h5>Total Items:</h5></li>
                @foreach ($products as $product)
        <li class="collection-item"><div>{{ $product['item']->title }}<a class="secondary-content">QTY:<strong>{{ $product['qty'] }}</strong></a></div></li>
                @endforeach   
        <li class="collection-item"><div><strong>Total Price:</strong> <a  class="secondary-content">${{ $totalPrice }}</a></div></li>
               
              </ul>
             </div>
            </div>
            <div class="row">
                <div class="col s12">
                        <form method="POST" action="{{ route('checkout') }}">
                                <div class="row">
                                        <div class="input-field col s12">
                                          <input name="name" placeholder="Name" id="first_name" type="text" class="validate" required>
                                          <label for="name">Name</label>
                                        </div>
                                        <div class="input-field col s12">
                                                <input name="address" placeholder="Address" id="address" type="text" class="validate" required>
                                                <label for="address">Address</label>
                                              </div>
        
                                      </div>
                                {{ csrf_field() }}

                                <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_8QEWudGPQ0YjS7EDU75ptViF"
        data-amount="{{ $totalPrice * 100}}"
        data-name="Laravel Shopping-Cart"
        data-description="Thanks for Shopping with us!"
        data-image="https://laracasts.com/images/series/circles/laravel-from-scratch.png"
        data-locale="auto"
        data-zip-code="true">
      </script>
 
            </form>
                </div>
            </div>
        
 
    </div>
@endsection






@section('scripts')
<script>
        const button = document.querySelector("button");
       button.setAttribute('disabled',true);

       const name = document.querySelector("input[name='name']");
       const address = document.querySelector("input[name='address']");

function validate(e){
    if(name.value !== "" && address.value!== ""){
        button.removeAttribute('disabled')
    }
    else{
        button.setAttribute('disabled',true);
    }



}
       name.addEventListener('change',validate);
       address.addEventListener('input',validate);
    </script>
@endsection


















{{-- 
<h4>Total Amount: ${{ $totalPrice }}.</h4>
<form class="col s12" method="post" action="{{ route('checkout') }}">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="first_name" type="text" class="validate" required>
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" required>
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Address" id="address" type="text" class="validate" required>
                  <label for="address">Address</label>
                </div>
              </div>
              <div class="row">
                    <div class="input-field col s6">
                      <input id="credit_cart" type="number"placeholder="1234 5678 9101 1112" length="16" class="validate" required>
                      <label for="credit card">Credit card</label>
                    </div>
                  </div>
                  <div class="row">
                        <div class="input-field col s6 m3">
                                <input type="text" class="datepicker" id='expire' required>
                          <label for="expiration date">Expiration date</label>
                        </div>
                        <div class="input-field col s6 m3">
                                <input placeholder="card number" id="cvv" type="password" class="validate" required>
                                <label for="CVV">CVV</label>
                              </div>
                      </div> --}}
                      
                      {{-- <div class="row">
                            <div class="col s12 m6 offset-m4">
                                   <button type='submit' class="waves-effect waves-light btn-large col m4"><i class="material-icons right">done</i>Submit!</button>
                            </div> --}}