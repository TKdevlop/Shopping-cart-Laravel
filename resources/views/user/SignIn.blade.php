@extends('layouts/master')
@section('title')
Laravel Shopping Cart
@endsection
@section('styles')
<style>
    .container{
        width:50%;
    }
    .err{
        padding: 10px;
        background: rgba(255,0,0,0.5);
        border-radius: 5px;
    }
</style>
@endsection
@section('content')

<div class="container">
        <div class="row">
            <form method='post' action={{ route('users/signin')}} class="col s12" id="reg-form">
             <div class="row">
               <div class="col s12">
                 <h2>SignIn</h2>  
               </div>
               @if(count($errors)>0)
               <div class="col s12 err">
                   @foreach ($errors->all() as $error)
               <p class="center">{{ $error }}</p>
                   @endforeach
                  
                  </div>
               @endif
               <div class="input-field col s12">
                    <input name="email" id="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s12">
                        <input name="password" id="password" type="password" class="validate" minlength="6" required>
                        <label for="password">Password</label>
                      </div>
                      <div class="input-field col">
                            <button class="btn btn-large btn-register waves-effect waves-light" type="submit">Login
                              <i class="material-icons right">done</i>
                            </button>

                     </div>
              </div>
              {{ csrf_field() }}
            </form>
          </div>
        <a title="SignUp" href="{{ route('users/signup') }}" class="ngl btn-floating btn-large waves-effect waves-light red"><i class="material-icons">input</i></a>
        </div>
        @endsection