<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;
class UserController extends Controller
{
    //function to access the signup view
    public function getSignup(){
        return view('user.signup');
    }
    //function to post the form signup
    public function postSignup(Request $request){
        //validation require field
       $this->validate($request,[
           'username' => 'required|max:20',
           'email' => 'email|required|unique:users',
           'password' => 'required|min:4'
       ]);
        
        $user = new User([
            'username' => $request ->input('username'),
            'email' => $request ->input('email'),
            'password' => bcrypt($request ->input('password'))
        ]);
        $user->save();
        Auth::login($user);
        //check if their is session in cart to it will direct in checkout
        if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
        return redirect()->route('user.profile');
    }
    //function to access the signin view
     public function getSignin(){
        return view('user.signin');
    }
    // function to validate the sign in account
    public function postSignin(Request $request){
        $this->validate($request,[
           'email' => 'email|required',
           'password' => 'required|min:4'
       ]);
        //try to authenticate the user sign in
        if(Auth::attempt(['email' =>$request->input('email'),
                       'password'=>$request->input('password')
                      ])){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }
    //function to access user profile
    public function getProfile(){
        //unserializng cart string into php object
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }
    // function logout
    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
