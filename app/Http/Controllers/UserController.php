<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
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
           'email' => 'email|required|unique:users',
           'password' => 'required|min:4'
       ]);
        
        $user = new User([
            'email' => $request ->input('email'),
            'password' => bcrypt($request ->input('password'))
        ]);
        $user->save();
        
        return redirect()->route('product.index');
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
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }
    //function to access user profile
    public function getProfile(){
        return view('user.profile');
    }
    // function logout
    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
}
