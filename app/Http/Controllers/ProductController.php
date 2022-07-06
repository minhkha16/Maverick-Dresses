<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class ProductController extends Controller
{
    public function index () {
        $truy_van = DB::table('products')->get();

        return view('admin.product.index',['products' => $truy_van]);
    }

    public function create () {
        // return view('create');
        DB::table('products')->get();

        return view('admin.product.create');
    }


    public function edit ($id) {
        $truy_van = DB::table('products')->where('id', $id)->first();

        return view('admin.product.edit',['id'=>$id, 'products'=>$truy_van]);
    }


    public function update (Request $request, $id) {$data = $request->except('_token','update');

        if(!empty($request->image)){
            $data_old = DB::table('products')->where('id', $id)->first();

            $url_image_old_path = public_path('images/'. $data_old->image);

            if(file_exists($url_image_old_path)){
                unlink($url_image_old_path);
            }

            $image_change_name = time().'-'.$request->image->extension();
            $request->image->move(public_path('images'), $image_change_name);
            $data['image'] = $image_change_name;
        }

        DB::table('products')->where('id', $id)->update($data);

        return redirect()->route('admin.product.index');
    }


    public function store (Request $request) {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',

            
        ],[
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price.required' => 'Vui lòng nhập giá',
            'image.required' => 'Vui lòng chọn ảnh',
        ]);

        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        $image_change_name = time().'-'.$request->image->extension();
        $request->image->move(public_path('images'), $image_change_name);
        $data['image'] = $image_change_name;


        DB::table('products')->insert($data);
        return redirect()->route('admin.product.index');
    }

    public function delete ($id) {
        DB::table('products')->where('id', $id)->delete();
        
        return redirect()->route('admin.product.index');
    }


    //Hiển thị giỏ hàng.
    public function home () {
        $products = DB::table('products')->get();

        return view('home', ['products' => $products]);
    }


    public function addToCart ($id) {
        $products = DB::table('products')->where('id', $id)->first();

        Cart::add($id, $products->name, 1, $products->price);//1 là số lượng
        // Cart::add($id, $products->name, $products->price);

        return redirect()->route('admin.product.cart',['products'=>$products]);
    }


    public function cart () {
        $cart = Cart::content();

        // $products = DB::table('products')->first();

        return view('cart', ['cart' => $cart]);
    }

    public function deleteCart ($rowID) {
        // DB::table('products')->where()->delete();

        Cart::remove($rowID);

        return redirect()->route('cart');
    }

    public function confirm () {
        $truy_van = DB::table('products')->get();

        return view('confirm',['products'=>$truy_van]);
    }

    //search
    public function search (Request $request) {
        $search = $request->name;
        $rong = '';
        if($search == ''){
            $rong = '';
        }else{
            $data = DB::table('products')->where('name', 'LIKE', '%'.$search.'%')->get();

            foreach ($data as $dt){
                $rong .= '<li>'.$dt->name.'</li>';
            }
        }
            return $rong;
    }
}
