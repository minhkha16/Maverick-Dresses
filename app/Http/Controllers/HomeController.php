<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class HomeController extends Controller
{
    public function home() {
        return view('cart.index');
    }

    public function addToCart($id) {
        $products = DB::table('products')->where('id', $id)->first();
        Cart::add($id , $products->name , 1 , $products->price); 
        return redirect()->route('testCart');
    }

    public function shopcategory() {
        $data = DB::table('products')->get();
        return view('cart.category_cart', ['products'=>$data]);
    }

    public function testCart(){
        $cart = Cart::content();
        return view('cartNe.buildCart', ['cart' => $cart]);
    }

    public function deleteCart ($rowID) {
        Cart::remove($rowID);
        return redirect()->route('testCart');
    }

    public function confirm () {
        $data = DB::table('products')->get();
        return view('cartNe.confirm',['products'=>$data]);
    }
    
    public function contact() {
        return view('cart.contact');
    }

    public function productdetails() {
        return view('cart.product_details');
    }

    public function confirmation() {
        return view('cart.confirmation');
    }

    public function shopingcart() {
        return view('cart.shopingcart');
    }
}
