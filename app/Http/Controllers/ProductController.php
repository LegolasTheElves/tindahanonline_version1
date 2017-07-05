<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;
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
        dd($request->session()->get('cart'));
        return redirect()->route('product.index');
     }
}
  