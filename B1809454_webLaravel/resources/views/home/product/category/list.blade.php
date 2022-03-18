@extends('layouts.master')

@section('title')
  <title>Máy ảnh Twenty</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('public/homes/home.css') }}">
@endsection



@section('content')

	<section>
		<div class="container">
			<div class="row">
 
				@include('components.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<br>
						@foreach($danhmuc as $dm)
						<h2 class="title text-center">Sản phẩm: {{$dm->name}}</h2>
						@endforeach
						@foreach( $products as $product)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<form>
												@csrf
												<input type="hidden" class="cart_product_id_{{ $product->id }}" value="{{ $product->id }}">
												<input type="hidden" class="cart_product_name_{{ $product->id }}" value="{{ $product->name }}">
												<input type="hidden" class="cart_product_image_{{ $product->id }}" value="{{ $product->feature_image_path }}">
												<input type="hidden" class="cart_product_price_{{ $product->id }}" value="{{ $product->price }}">
												<input type="hidden" class="cart_product_qty_{{ $product->id }}" value="1">
											<a href="{{ route('showProductDetail', ['id' => $product->id]) }}" >
												<img src="{{ asset('public'.$product['feature_image_path']) }}" alt="" style="width: 267px; height: 249px;"  />
												<h2>{{ number_format((float)$product->price) }} VND</h2>
												<p>{{ $product->name }}</p>
											</a>

											<button type="button" 
											data-id="{{ $product->id }}"
											class="btn btn-default add-to-cart " 
											name="add-to-cart"><i class="fa fa-shopping-cart"></i>
												 Thêm vào giỏ hàng</button>
											</form>

										</div>
									</div>
								</div>
							</div>
						@endforeach
						
						{{ $products->links() }}
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

@endsection

@section('js')
 <script type="text/javascript">
    	$(document).ready(function(){
    		$('.add-to-cart').click(function(){
    			let id=$(this).data('id');
    			let cart_product_id = $('.cart_product_id_' + id).val();
    			let cart_product_name = $('.cart_product_name_' + id).val();
    			let cart_product_image = $('.cart_product_image_' + id).val();
    			let cart_product_price = $('.cart_product_price_' + id).val();
    			let cart_product_qty = $('.cart_product_qty_' + id).val();
    			let _token = $('input[name="_token"]').val();
    			
    			$.ajax({
					url: '{{ url('/products/add-cart-ajax') }}',
					method: 'POST',
					data: {cart_product_id:cart_product_id, cart_product_name:cart_product_name, cart_product_image:cart_product_image, cart_product_price:cart_product_price, cart_product_qty:cart_product_qty, _token:_token},
					success: function(data){
						swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{route('showCart')}}";
                            });

						
					},
					error: function(){

					}
				});
    		});
    	});
    </script>
@endsection
