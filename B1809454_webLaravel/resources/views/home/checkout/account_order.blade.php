@extends('layouts.master')

@section('title')
  <title>Máy ảnh Twenty</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('public/homes/home.css') }}">
@endsection

@section('content')
<div class="container">
<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home') }}">Home</a></li>
				  <li class="active">Tài khoản</li>
				</ol>
</div>
	</div>
	
<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Tài khoản của tôi</h2>
		<div class="panel-group category-products" id="accordian">

			@foreach($customer as $khachhang)
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
								<a href="">
									<p>Tên tài khoản: <b>{{ $khachhang->name}}</b></p>
								</a>
								<a href="">
									<p>Địa chỉ Email: <b>{{ $khachhang->email}}</b></p>
								</a>
								<a href="">
									<p>Số điện thoại: <b>{{ $khachhang->phone}}</b></p>
								</a>
						</h4>
					</div>
				</div>
		</div>
	</div>
</div>

<section id="cart_items">
		<div class="container">
			
			<h2 class="title text-center">Thông tin tài khoản</h2>
			
			<div class="col-sm-9">
			
			<!-- <div class="col-sm-12"> -->
			<div class="review-payment">
				<h2>Xin chào, <b>{{$khachhang->name}} !</b></h2>
			</div>
		@endforeach

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					
					<tbody>
						<thead>
						<tr class="cart_menu">
							<td class="image">Mã đơn</td>
							<td class="description">Ngày đặt</td>
							<td class="price">Địa chỉ nhận</td>
							<td class="quantity">Số điện thoại</td>
							<td class="total">Tổng đơn hàng</td>
							<td class="action">Tình trạng đơn</td>
						</tr>
					</thead>
					<tbody>
						
						@if($data != NULL)
						@php
								
								$tongcuoi = 0;
						@endphp

						@foreach($data as $key => $orderItem)
							@php
								$tongcuoi = $orderItem->total + $orderItem->shipping_fee;
							@endphp
						
						<tr>
							<td class="image">
								{{ $orderItem->id }}
							</td>
							<td class="cart_description">
								{{ $orderItem->created_at }}
							</td>
							<td class="cart_price">
								{{ $orderItem->address }}
							</td>
							<td class="cart_quantity">
									{{ $orderItem->phone }}
							</td>
							<td class="cart_total">
								{{ number_format((float)$tongcuoi,0,',','.') }} vnd
							</td>
							<td class="cart_action">
								{{ $orderItem->status }}
							</td>
						</tr>

						@endforeach

						@else
							<tr>
								<td colspan="6">Bạn chưa có đơn hàng nào!!!</td>
							</tr>
						@endif

					</tbody>
				</table>
			</div>

		</div>
	</section> <!--/#cart_items-->

		<br><br><br>
		
@endsection

@section('js')
 
@endsection