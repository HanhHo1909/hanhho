<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\Slider;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Customer;
use App\Order;
use App\Shipping;
use App\OrderDetail;
session_start();

class CheckoutController extends Controller
{
    private $slider;
    private $category;
    private $product;
    private $customer;
    private $order;
    private $orderDetail;
    private $shipping;

    public function __construct(Slider $slider, Category $category, Product $product, Customer $customer, Order $order, OrderDetail $orderDetail, Shipping $shipping)
    {
       $this->slider = $slider;
       $this->category = $category;
       $this->product = $product;
       $this->customer = $customer;
       $this->order = $order;
       $this->shipping = $shipping;
       $this->orderDetail = $orderDetail;
    }

    public function loginCheckout()
    {
        $sliders = $this->slider->latest()->get();
        $categorys = $this->category->where('parent_id',0)->get();
       return view('home.checkout.login_checkout', compact('sliders','categorys'));
    }

    public function addCustomer(Request $request)
    {
        $data = $this->customer->create([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'password' => md5($request->customer_pass),
            'phone' => $request->customer_phone
        ]);
        
        Session::put('customer_id', $data->id);
        Session::put('customer_name', $data->name);
        return Redirect()->route('customerAccount');
       
    }

    public function checkout()
    {
        
        $categorys = $this->category->where('parent_id',0)->get();
        return view('home.checkout.show_checkout', compact('categorys'));
    }

    public function saveCheckoutCustomer(Request $request)
    {
        $customer_id = Session::get('customer_id');
        $data = $this->shipping->create([
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'notes' => $request->shipping_notes,
            'phone' => $request->shipping_phone,
            'customer_id' => $customer_id,
            'address' => $request->shipping_address
        ]);
        
        Session::put('shipping_id', $data->id);
        
        return redirect()->route('payment');
    }

    public function payment()
    {
        
        $categorys = $this->category->where('parent_id',0)->get();
        return view('home.checkout.payment', compact('categorys'));
    }

    public function logoutCheckout()
    {
        Session::flush();
        return Redirect()->route('loginCheckout');
    }

    public function loginAccount(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = $this->customer->where('email',$email)->where('password', $password)->first();
        if($result){
            Session::put('customer_id', $result->id);
            return Redirect()->route('customerAccount');
        }else {
            return Redirect()->route('loginCheckout');
        }
    }

    public function orderPlace(Request $request)
    {
        $payment_type = $request->payment_option;
        Session::put('payment_type', $payment_type);
        //insert to order

        $order_data = $this->order->create([
            'shipping_id' => Session::get('shipping_id'),
            'total' => Session::get('total'),
            'shipping_fee' => 35000,
            'status' => 'Đang chờ xử lý'
        ]);

        //insert to order detail
        $cart = Session::get('cart');
        foreach( $cart as $v_cart){
            $orderDetail_data = $this->orderDetail->create([
                'order_id' => $order_data->id,
                'product_id' => $v_cart['product_id'],
                'product_name' => $v_cart['product_name'],
                'product_quantity' => $v_cart['product_qty'],
                'product_price' => $v_cart['product_price']
            ]);  
            $pro = $this->product->where('id',$v_cart['product_id'])->get();
            foreach($pro as $productItem){
                $pro_qty = $productItem->quantity_product;
                $views = $productItem->views_count;
                $result = $pro_qty - (float)$v_cart['product_qty'];
                $this->product->find($v_cart['product_id'])->update([
                    'quantity_product' =>   $result,
                    'views_count' => $views +1
                ]);
                
            }
        }
        Session::forget('cart');
        return Redirect()->route('customerAccount');
    }

    public function customerAccount()
    {
        $customer_id = Session::get('customer_id');
        if($customer_id != NULL){
            $customer = $this->customer->where('id', $customer_id)->get();


            $data = DB::table('orders')
            ->join('shippings','orders.shipping_id','=','shippings.id')
            ->where('shippings.customer_id',$customer_id)
            ->select('shippings.address','shippings.phone','orders.*')->get();
            

            return view('home.checkout.account_order', compact('data','customer'));
            } else{
                return Redirect()->route('loginCheckout');
            }
        
        
    }

}
