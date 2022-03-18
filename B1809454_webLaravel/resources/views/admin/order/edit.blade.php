@extends('layouts.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('css')
  <link href="{{ asset('public/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Cập nhật đơn hàng','key' =>''])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('orders.update', [ 'id' => $order_edit->id ]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <h4 class="tieude">Tình trạng đơn hàng</h4>
                <select class="form-control" name="tinh_trang">
                    <option value="Đang chờ xử lý">Đang chờ xử lý</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                    <option value="Đã giao">Đã giao</option>
                  </select>
                
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection


  