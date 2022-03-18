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
				  <li><a href="{{ route('showCart') }}">Giỏ hàng</a></li>
				  <li class="active">Thông tin thanh toán</li>
				</ol>
</div>
	</div>
@include('components.sidebar') 


<section id="cart_items">
		<div class="container">
			<br>
			<h2 class="title text-center">Thanh toán giỏ hàng</h2>
			
			<div class="col-sm-19">
				<div class="col-sm-9">
			<div class="register-req">
				<p style="font-size: 16px; color:#931471fa;">Hãy đăng nhập hoặc đăng ký để thanh toán giỏ hàng và xem lại sản phẩm muốn thanh toán</p>
			</div>
			</div>
						
			<!-- <div class="col-sm-12"> -->
		<div class="shopper-informations">
				<div class="row">
					
					
					<!-- <div class="col-sm-8"> -->
						<div class="bill-to">
							
							<div class="form-one">
								<form action="{{ route('saveCheckoutCustomer') }}" method="POST" style="margin-left: 126px; margin-right: -237px;">
									<h2 style="text-align: center; color:#7c1165;"><b>Thông tin gửi hàng</b></h2>
									{{ csrf_field() }}
									<input type="text" name="shipping_email" placeholder="Email *">
									<input type="text" name="shipping_name" placeholder="Họ và tên *">
									
									<input type="text" name="shipping_address" placeholder="Địa chỉ nhận *">
									<input type="text" name="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
									<input class="btn btn-primary" type="submit" name="send_order" value="Submit">
								</form>
							</div>
							
						</div>
					<!-- </div> -->
										
				</div>
			</div>
		<!-- </div> -->
	</div>
		</div>
		</div>

	</section> <!--/#cart_items-->

		
 
@endsection

@section('js')
 

@endsection