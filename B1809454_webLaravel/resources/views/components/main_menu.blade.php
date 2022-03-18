<div class="mainmenu pull-left">
	<ul class="nav navbar-nav collapse navbar-collapse">
		<li><a href="{{ route('home') }}" class="active"><i class="fa fa-home"></i><b> Trang chủ</b></a></li>
		
		<!-- <li><a href=""><i class="fa fa-star"></i> Yêu thích</a></li> -->
		<li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i><b> Giỏ hàng</b></a></li>
		<?php
			$customer_id = Session::get('customer_id');
			$shipping_id = Session::get('shipping_id');
			if($customer_id != NULL && $shipping_id == NULL){
		?>
		
			<li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i><b> Thanh toán</b></a></li>
		<?php
			}elseif($customer_id != NULL && $shipping_id != NULL) {
		?>
			<li><a href="{{ route('payment') }}"><i class="fa fa-crosshairs"></i><b> Thanh toán</b></a></li>
		<?php
			}else{
		?>
			<li><a href="{{ route('loginCheckout') }}"><i class="fa fa-crosshairs"></i><b> Thanh toán</b></a></li>
		<?php
			}
		?>

		
			<li><a href="{{ route('customerAccount') }}"><i class="fa fa-lock"></i><b> Tài khoản</b></a></li>
		

		<?php
			$customer_id = Session::get('customer_id');
			if($customer_id != NULL){
		?>
		
			<li><a href="{{ route('logoutCheckout') }}"><i class="fa fa-lock"></i><b> Đăng xuất</b></a></li>
		<?php
			}else {
		?>
			<li><a href="{{ route('loginCheckout') }}"><i class="fa fa-lock"></i><b> Đăng nhập</b></a></li>
		<?php
			}
		?>
		
	    
	</ul>
</div>