<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Customer;
use App\Shipping;
use DB;
use Session;
use App\Traits\DeleteModelTrait;
session_start();

class OrderController extends Controller
{
    use DeleteModelTrait;
    
    private $order;
    private $customer;
    private $orderDetail;
    private $shipping;

    public function __construct(Order $order, Customer $customer, OrderDetail $orderDetail, Shipping $shipping)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->orderDetail = $orderDetail;
        $this->shipping = $shipping;
    }

    public function index()
    {
        $order_waiting = DB::table('orders')
        ->join('shippings','orders.shipping_id','=','shippings.id')
        ->join('customers','shippings.customer_id','=','customers.id')
        ->where('orders.status','Đang chờ xử lý')
        ->select('customers.name','orders.*')->latest()->paginate(4);

        $order_received = DB::table('orders')
        ->join('shippings','orders.shipping_id','=','shippings.id')
        ->join('customers','shippings.customer_id','=','customers.id')
        ->where('orders.status','Đã xác nhận')
        ->select('customers.name','orders.*')->latest()->paginate(4);

        $order_delivered = DB::table('orders')
        ->join('shippings','orders.shipping_id','=','shippings.id')
        ->join('customers','shippings.customer_id','=','customers.id')
        ->where('orders.status','Đã giao')
        ->select('customers.name','orders.*')->latest()->paginate(4);
        
         
        return view('admin.order.index', compact('order_waiting', 'order_received', 'order_delivered'));
    }

    public function viewOrder($id)
    {
        $order_customer = DB::table('orders')
        ->join('shippings','orders.shipping_id','=','shippings.id')
        ->join('customers','shippings.customer_id','=','customers.id')
        ->where('orders.id', $id)
        ->select('customers.*','orders.total','orders.shipping_fee')->get();

        $order_shipping = DB::table('orders')
        ->join('shippings','orders.shipping_id','=','shippings.id')
        ->where('orders.id', $id)
        ->select('shippings.*')->get();
        $order_product = $this->orderDetail->where('order_id', $id)->get();
        //dd($order_shipping);
        return view('admin.order.view', compact('order_customer', 'order_product','order_shipping'));
    }

    public function editOrder($id)
    {
        $order_edit = $this->order->find($id);

        return view('admin.order.edit', compact('order_edit'));
    }

    public function updateOrder($id, Request $request)
    {
        // dd($id.'----'.$request->tinh_trang);
        $this->order->find($id)->update([
            'status' => $request->tinh_trang
            
        ]);
        return redirect()->route('orders.index');
    }

     public function delete($id)
    {
        $this->order->find($id)->update([
            'status' => 'Đã hủy bởi cửa hàng'
            
        ]);
        return $this->deleteModelTrait($id, $this->order);
    }

}
