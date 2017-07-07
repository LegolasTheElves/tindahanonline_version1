<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
class ProductController extends Controller
{
    //product index controller
     public function getIndex()
     {
         $products = Product::all();
         return view('shop.index', ['products' => $products]);
     }
    //add to cart controller 
     public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
         
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
     }
    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);
    }
    //checkout controller
    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' =>$total]);
    }
    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        Stripe::setApiKey('sk_test_xood92HkyK0JW0dc0aQvJ54P');
        try {
              Charge::create(array(
              "amount" => $cart->totalPrice * 100,
              "currency" => "usd",
              "source" => $request->input('stripeToken'), // obtained with Stripe.js
              "description" => "test charge."
            ));
        }catch (\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    } 
}
  