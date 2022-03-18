@extends('layouts.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admins/product/index/list.css') }}">
@endsection

@section('js')
  <script src="{{ asset('public/vendors/sweetalert2/sweetalert2@11.js') }}"></script>
  <script src="{{ asset('public/admins/product/index/list.js') }}"></script>
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
     @include('partials.content-header',['name' => 'Chi tiết đơn hàng','key' =>''])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-12">
            <a href="" class="btn btn-success float-right m-2">Add</a>
          </div> -->

          
           @foreach($order_customer as $order)
          <div class="col-md-10">
            <h4 class="tieude">Thông tin khách hàng</h4>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
             
              <tbody>
                <tr>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->phone }}</td>
                  <td>{{ $order->email }}</td>
                </tr>
               
              </tbody>
           </table>
          </div>
           <br><br>

           <div class="col-md-10">
                  <h4 class="tieude">Thông tin vận chuyển</h4>
           
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tên người nhận</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Ghi chú của người mua</th>
                </tr>
              </thead>
              @foreach($order_shipping as $shipping)
              <tbody>
                <tr>
                  <td>{{ $shipping->name }}</td>
                  <td>{{ $shipping->address }}</td>
                  <td>{{ $shipping->phone }}</td>
                  <td>{{ $shipping->notes }}</td>
                </tr>
               
              </tbody>
              @endforeach
           </table>
           </div>
           <br><br>
           <?php
              $tongcuoi = $order->total + $order->shipping_fee;
            ?>

           <div class="col-md-10">
                  <h4 class="tieude">Thông tin sản phẩm</h4>
          
           <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Tổng tiền</th>
                  
          
                </tr>
              </thead>
              <tbody>
                @foreach($order_product as $detail)
                <?php
                  $tongtien = $detail->product_price * $detail->product_quantity;
                ?>
                <tr>
                  <td>{{ $detail->product_name }}</td>
                  <td>{{ number_format((float)$detail->product_price,0,',','.') }} vnd</td>
                  <td>{{ $detail->product_quantity }}</td>
                  <td>{{ number_format((float)$tongtien,0,',','.') }} vnd</td>
                </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td><b>Phí sản phẩm </b></td>
                  <td>{{ number_format((float)$order->total,0,',','.') }} vnd</td>
                </tr>

                <tr>
                  <td></td>
                  <td></td>
                  <td><b>Phí vận chuyển</b></td>
                  <td>{{ number_format((float)$order->shipping_fee,0,',','.') }} vnd</td>
                </tr>
                
                <tr>
                  <td></td>
                  <td></td>
                  <td><b>Tổng đơn hàng</b></td>
                  <th scope="col">{{ number_format((float)$tongcuoi,0,',','.') }} vnd</th>
                </tr>
              </tbody>
           </table>
          
          </div>
           @endforeach
            
        </div>
      </div>
    </div>
  </div>

@endsection


  