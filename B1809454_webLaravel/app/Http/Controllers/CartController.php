<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Slider;
use App\Category;
use App\Product;
use App\ProductImage;

session_start();

class CartController extends Controller
{
    private $slider;
    private $category;
    private $product;
    private $productImage;
    
    public function __construct(Slider $slider, Category $category, Product $product, ProductImage $productImage)
    {
       $this->slider = $slider;
       $this->category = $category;
       $this->product = $product;
       $this->productImage = $productImage;
    }

    public function addCartAjax(Request $request)
    {
        // Session::forget('cart');
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0,26),5);
        $cart = Session::get('cart');
    
        if($cart == true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price']
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price']
            );
            
        }
        Session::put('cart', $cart);
        Session::save();
        
    }

     public function showCart(Request $request)
    {
        // $meta_desc = "Gioi hang cua ban";
        $url_canonical = $request->url();

        
        return view('home.product.cart.cart', compact('url_canonical'));
    }
 
    public function deleteCart($id)
    {
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['session_id'] == $id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công!');
        }else{
            return redirect()->back()->with('message','Xóa thất bại, thử lại sau!');
        }
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id'] == $key){
                        $produc_id = $cart[$session]['product_id'];
                        $product = $this->product->where('id', $produc_id)->get();
                        foreach($product as $val){
                            $pro_qty = $val->quantity_product;
                            if($qty <= $pro_qty){
                                 $cart[$session]['product_qty'] = $qty;
                            }else{
                                return redirect()->back()->with('message','Cập nhật số lượng không thành công! Số lượng sản phẩm không đủ');
                            }
                        }
                        
                       
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Cập nhật số lượng thành công!');
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng không thành công');
        }
    }

    public function deleteAll()
    {
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            return redirect()->back()->with('message','Đã xóa tất cả sản phẩm thành công!!!');
        }
    }
}
