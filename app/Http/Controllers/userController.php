<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;
class userController extends Controller
{
    public function getSignUp(){
     
        return view('user/SignUp');
    }
    public function postSignUp(Request $REQUEST){
            $this->validate($REQUEST,[
                'email'=>'email|required|unique:users',
                'password'=>'required|min:6'
            ]);
        $user = new User([
            'email'=> $REQUEST->input('email'),
            'password'=> bcrypt($REQUEST->input('password')) 
        ]);
        $user->save();
        Auth::login();
        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
         return redirect()->to($oldUrl);
       }
        return redirect()->route('users/profile');
    }
    public function getSignIn(){
     
        return view('user/SignIn');
    }
    public function postSignIn(Request $REQUEST){
        $this->validate($REQUEST,[
            'email'=>'email|required',
            'password'=>'required|min:6'
        ]);
       if(Auth::attempt(['email' => $REQUEST->input('email'),'password'=> $REQUEST->input('password')])){
           if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
             return redirect()->to($oldUrl);
           }
           return redirect()->route('users/profile');
       }
       return redirect()->back();
    }
    public function userProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
      return view('user/Profile',['orders'=>$orders]);
    }
    public function userLogout(){
        Auth::logout();
        return redirect()->route('Product/index');
      }
}
