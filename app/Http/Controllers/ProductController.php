<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
class ProductController extends Controller
{
    //admin controller retrieve all data from database
    public function adminIndex(){
        $products = DB::table('products')->get();
        return view('admin.myproducts',compact('products'));
    }
    //delete single item
    public function destroy($id)
    {
    	DB::table('products')->delete($id);
    	return response()->json(['success'=>"Product Deleted successfully.",'tr'=>'tr_'.$id]);
    }
   
    
    //product index controller
     public function getIndex()
     {
         //display all products
         $products = DB::table('products')
             ->join('categories', 'products.category_id', '=' ,'categories.id')
             ->select('products.*', 'categories.*')
             ->paginate(6);
         //display all mobiles category
        $mobiles = DB::table('products')
             ->join('categories', 'products.category_id', '=' ,'categories.id')
             ->select('products.*', 'categories.*')
             ->where('category_id', 1)
             ->paginate(6);
         return view('shop.index', ['products' => $products, 'mobiles' => $mobiles]);

     }
    //CONTROLLER for search
    /*public function getSearch($key)
    {
        $product_s = Product::search($key)->get();
        return view('shop.search', compact('product_s'));
    }*/
    public function getSearch(Request $request)
    {
    	if($request->has('titlesearch')){
    		$products = Product::search($request->titlesearch)
    			->paginate(6);
    	}else{
    		 return redirect()->route('product.index');
    	}
    	return view('shop.search', compact('products'));
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
    // reduce cart by one
    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        
        if(count($cart->items) > 0){
             Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    //remove all item in cart
     public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if(count($cart->items) > 0){
             Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
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
            //create charge in payer
              $charge = Charge::create(array(
              "amount" => $cart->totalPrice * 100,
              "currency" => "usd",
              "source" => $request->input('stripeToken'), // obtained with Stripe.js
              "description" => "test charge."
            ));
            //storing data in database
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            
            //check the user then save the order to the database
            Auth::user()->orders()->save($order);
        }catch (\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    } 
}
  