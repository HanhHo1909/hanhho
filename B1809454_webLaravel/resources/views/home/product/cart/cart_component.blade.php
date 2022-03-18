<div class="table-responsive cart_info">
				
	<table class="table table-condensed">
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
			<tr>
				<td class="stt"></td>
				<td class="image"></td>
				<td class="name"></td>
				<td class="price"></td>
				<td class="quantity"><a class="btn btn-default check_out" href="{{ route('deleteAll') }}">Xóa tất cả</a></td>
				<td class="cart_price">
					
				</td>
				<td></td>
			</tr>
			
			@php
					$tongcuoi = $total + 25000;
					
			@endphp
			
		</tbody>
	</table>

</div>

</div>
</section> <!--/#cart_items-->
	
<section id="do_action">
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng tiền sản phẩm<span>{{ number_format((float)$total,0,',','.') }} vnd</span></li>
						<li>Phí vận chuyển <span>25.000 vnd</span></li>
						<li>Thành tiền <span><b>{{ number_format((float)$tongcuoi,0,',','.') }} vnd</b></span></li>
					</ul>
						<?php
							$customer_id = Session::get('customer_id');
							$shipping_id = Session::get('shipping_id');
							
							if($customer_id != NULL && $shipping_id == NULL){
						?>
						
							<a class="btn btn-default check_out" href="{{ route('checkout') }}">Thanh toán</a>
						<?php
							}elseif($customer_id != NULL && $shipping_id != NULL) {
						?>
							<a class="btn btn-default check_out" href="{{ route('payment') }}">Thanh toán</a>
						<?php
							}else{
						?>
							<a class="btn btn-default check_out" href="{{ route('loginCheckout') }}">Thanh toán</a>
						<?php
							}
						?>

						
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->	
