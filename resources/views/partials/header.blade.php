<ul id="dropdown1" class="dropdown-content">
  <li class="divider"></li>
  @if(Auth::check())
  <li><a href="{{ route('users/profile') }}">Profile</a></li>
<li><a href="{{ route('users/logout') }}">Logout</a></li>
  @else
  <li><a href="{{ route('users/signin') }}">SignIn</a></li>
<li><a href="{{ route('users/signup') }}">SignUp</a></li>
  @endif

</ul>
<ul class="sidenav" id="mobile-demo">


<li class="divider"></li>
@if(Auth::check())
<li><a href="{{ route('users/profile') }}">Profile</a></li>
<li><a href="{{ route('users/logout') }}">Logout</a></li>
@else
<li><a href="{{ route('users/signin') }}">SignIn</a></li>
<li><a href="{{ route('users/signup') }}">SignUp</a></li>
@endif
  </ul>
<nav>
  <div class="nav-wrapper">
    <a href="/" class="brand-logo"> <span class="hide-on-small-only">&nbsp; 	&nbsp;</span>	 Shopping Cart</a>
     <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
    
    <li><a href="{{ route('product/cart')}}"><i class="material-icons left">shopping_cart</i>Cart <span>({{ Session::has('cart')? Session::get('cart')->totalQty:0 }})</span> </a> </li>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons left">account_circle</i>User Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>

