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
				  <li class="bread"><a href="{{ route('showCart') }}">Giỏ hàng</a></li>
				  <li><a href="{{ route('checkout') }}">Thông tin nhận hàng</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
</div>
	</div>
	
@include('components.sidebar') 

		
<section id="cart_items">
		<div class="container">
			
			
			<div class="col-sm-9">
			<h2 class="title text-center" style="position: initial;">Thanh toán giỏ hàng</h2>
			
			
			<div class="col-sm-12">
			<div class="review-payment">
				<h2>Xem lại và thanh toán</h2>
			</div>
			@if(Session::get('cart') == true)
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					
					<tbody>
						<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td class="action">Tùy chọn</td>
						</tr>
					</thead>
					<tbody>
						

						@php
								$total = 0;
								$tongcuoi = 0;
						@endphp

						@foreach( Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_qty']*$cart['product_price'];
								$total+= $subtotal;
							@endphp
						<form action="{{ route('updateCart') }}" method="POST">
							@csrf
						<tr>
							<td class="cart_product">
								<img src="{{ asset('public'.$cart['product_image']) }}" alt="" style="width: 110px; height: 110px;"/>
							</td>
							<td class="cart_description">
							
								<p><b>{{ $cart['product_name'] }}</b></p>
							</td>
							<td class="cart_price">
								<p>{{ number_format((float)$cart['product_price'],0,',','.') }} vnd</p>
							</td>
							<td class="cart_quantity">
									
										<input class="cart_quantity_input" type="number" name="cart_qty[{{ $cart['session_id'] }}]" value="{{ $cart['product_qty'] }}" min="1">
									
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format((float)$subtotal,0,',','.') }} vnd</p>
							</td>
							<td class="cart_action">
								<input class="btn btn-primary" type="submit" name="update_qty" value="Cập nhật" min="1">
								<a href="{{route('deleteCart', ['id' => $cart['session_id'] ])}}"><input class="btn btn-primary" name="delete_cart" value="Xóa" size="2"></a>
							</td>
						</tr>
						</form>

						@endforeach
						
						
						@php
								$tongcuoi = $total + 25000;
								
						@endphp

				
						<tr>
							<td colspan="3">&nbsp;</td>
							<td colspan="3">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tổng tiền sản phẩm</td>
										<td>${{ number_format((float)$total,0,',','.') }} vnd</td>
									</tr>
									<?php
										Session::put('total', $total);
									?>
									<tr class="shipping-cost">
										<td>Phí vận chuyển</td>
										<td>25.000 vnd</td>										
									</tr>
									<tr>
										<td>Thành tiền</td>
										<td><span>${{ number_format((float)$tongcuoi,0,',','.') }} vnd</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
						@else
							@include('home.product.cart.cart_empty')
						@endif
						
			<div class="payment-options">
				<h4>Hình thức thanh toán</h4>
					<form action="{{ route('orderPlace') }}" method="POST">
						{{ csrf_field() }}
						<span>
							<label><input name="payment_option" value="tiền mặt" type="checkbox"> Thanh toán bằng tiền mặt</label>
						</span>
						<input class="btn btn-primary" type="submit" name="send_order_place" value="Đặt hàng">
					</form>
				</div>
		</div>
		</div>
	</section> <!--/#cart_items-->

	
@endsection

@section('js')
 

@endsection