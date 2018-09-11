<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Auth;
\Stripe\Stripe::setApiKey('sk_test_JIrCfVj7bJ3N3qAYunNHDX2N');

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop/index',['products'=> $products]);
    }
    public function getAddToCart(Request $request,$id){
          $product = Product::find($id);
           $oldCart = $request->session()->has('cart')?$request->session()->get('cart'):null;
           $cart = new Cart($oldCart);
           $cart->add($product,$product->id);
        
           $request->session()->put('cart',$cart);
        //    dd($request->session()->get('cart'));
        return redirect()->route('Product/index');
    }
    public function getCart(){
   if(!Session::has('cart')){
    return view('shop/cart',['products'=>null]);
   }
        $oldCart = Session::get('cart');
        $cart =new Cart($oldCart);
        return view('shop/cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }
    public function  increaseQty(Request $request,$id){
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart')?$request->session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        return redirect()->route('product/cart');
    }
    public function decreaseQty(Request $request,$id){
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart')?$request->session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->sub($product,$product->id);
        $request->session()->put('cart',$cart);
        return redirect()->route('product/cart');
    }
    public function deleteQty(Request $request,$id){
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart')?$request->session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->del($product,$product->id);
        $request->session()->put('cart',$cart);
        return redirect()->route('product/cart');
    }
    public function getCheckout(){
        if(!Session::has('cart')){
            return redirect()->route('Product/index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop/checkout',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }
    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('Product/index');
        }
        try{
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $charge = \Stripe\Charge::create(['amount' => $cart->totalPrice*100, 'currency' => 'usd', 'source' => $request->input('stripeToken') ]);
            
            $order = new Order();
            $order->cart =  serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            Auth::user()->orders()->save($order);
            
        }
     catch(\Exception $e){
         return redirect()->route('checkout')->with('error',$e->getMessage());
     }
     Session::forget('cart');
     return redirect()->route('Product/index')->with('success',"Product Purchased Sucessfully!");
    }
}
  