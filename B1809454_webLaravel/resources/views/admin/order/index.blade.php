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
    @include('partials.content-header',['name' => 'Danh sách đơn hàng','key' =>''])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-12">
            <a href="" class="btn btn-success float-right m-2">Add</a>
          </div> -->

          <div class="col-md-10">
                  <h4 class="tieude">Đơn hàng đang chờ xử lý</h4>
            <table class="table"> 
              <thead>
                  <th scope="col">#</th>
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Phí sản phẩm</th>
                  <th scope="col">Phí vận chuyển</th>
                  <th scope="col">Tổng đơn hàng</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               

                @foreach ($order_waiting as $orderWait)
                <?php
                  $tongcuoi1 = $orderWait->total +$orderWait->shipping_fee;
                ?>
                <tr>
                  <td><b>{{ $orderWait->id }}</b></td>
                  <td>{{ $orderWait->name }}</td>
                  <td>{{ number_format((float)$orderWait->total,0,',','.') }}</td>
                  <td>{{ number_format((float)$orderWait->shipping_fee,0,',','.') }}</td>
                  <td>{{ number_format((float)$tongcuoi1,0,',','.') }} vnd</td>
                  
                  
                  <td>
                    <a href="{{ route('orders.view', ['id' => $orderWait->id]) }}" class="btn btn-default">View</a>
                    <a href="{{ route('orders.edit', ['id' => $orderWait->id]) }}" class="btn btn-success">Update</a>
                    <a href=""
                      data-url="{{ route('orders.delete', [ 'id' => $orderWait->id ]) }}"
                    class="btn btn-danger action_delete">Delete</a>
                  </td>
                </tr>
                @endforeach

               
              </tbody>
           </table>
          </div>

          <div class="col-md-12">
            {{ $order_waiting->links() }}
          </div> 
          <br><br>
          <div class="col-md-10">
            <h4 class="tieude">Đơn hàng đã xác nhận</h4>
            <table class="table">
              <thead>
                
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Phí sản phẩm</th>
                  <th scope="col">Phí vận chuyển</th>
                  <th scope="col">Tổng đơn hàng</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               
                @foreach ($order_received as $orderRec)
                <?php
                  $tongcuoi2 = $orderRec->total +$orderRec->shipping_fee;
                ?>
                <tr>
                  <td><b>{{ $orderRec->id }}</b></td>
                  <td>{{ $orderRec->name }}</td>
                  <td>{{ number_format((float)$orderRec->total,0,',','.') }}</td>
                  <td>{{ number_format((float)$orderRec->shipping_fee,0,',','.') }}</td>
                  <td>{{ number_format((float)$tongcuoi2,0,',','.') }} vnd</td>
                  
                  
                  <td>
                    <a href="{{ route('orders.view', ['id' => $orderRec->id]) }}" class="btn btn-default">View</a>
                    <a href="{{ route('orders.edit', ['id' => $orderRec->id]) }}" class="btn btn-success">Update</a>
                    <a href=""
                      data-url="{{ route('orders.delete', [ 'id' => $orderRec->id ]) }}"
                    class="btn btn-danger action_delete">Delete</a>
                </tr>
                @endforeach

    
              </tbody>
           </table>
          </div>

          <div class="col-md-12">
            {{ $order_received->links() }}
          </div> 
          <br><br>
          <div class="col-md-10">
            <h4 class="tieude">Đơn hàng đã giao</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Phí sản phẩm</th>
                  <th scope="col">Phí vận chuyển</th>
                  <th scope="col">Tổng đơn hàng</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($order_delivered as $orderDeli)
                <?php
                  $tongcuoi3 = $orderDeli->total +$orderDeli->shipping_fee;
                ?>
                <tr>
                  <td><b>{{ $orderDeli->id }}</b></td>
                  <td>{{ $orderDeli->name }}</td>
                  <td>{{ number_format((float)$orderDeli->total,0,',','.') }}</td>
                  <td>{{ number_format((float)$orderDeli->shipping_fee,0,',','.') }}</td>
                  <td>{{ number_format((float)$tongcuoi3,0,',','.') }} vnd</td>
                  
                  
                  <td>
                    <a href="{{ route('orders.view', ['id' => $orderDeli->id]) }}" class="btn btn-default">View</a>
                  </td>
                </tr>
                @endforeach

                
              </tbody>
           </table>
          </div>

          <div class="col-md-12">
            {{ $order_delivered->links() }}
          </div> 
            
        </div>
      </div>
    </div>
  </div>

@endsection


  