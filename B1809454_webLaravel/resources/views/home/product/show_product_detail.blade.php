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
				@foreach ($product_detail as $proDetail)
					<div class="product-details">
						<!--product-details-->
						
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ asset('public'.$proDetail['feature_image_path']) }}" alt="" />
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    	
										<div class="item active">
											@foreach( $product_image as $keyImage => $imageItem )
										  <a href=""><img src="{{ asset('public'.$imageItem['image_path']) }}" alt="" style="width: 85px; height: 84px;"></a>
										
										 @endforeach
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{ asset('eshopper/images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{ $proDetail->name }}</h2>
								<p>Product ID: {{ $proDetail->id }}</p>
								<img src="{{asset('eshopper/images/product-details/rating.png') }}" alt="" />
								<span>
									<form>
										@csrf
										<input type="hidden" class="cart_product_id_{{ $proDetail->id }}" value="{{ $proDetail->id }}">
										<input type="hidden" class="cart_product_name_{{ $proDetail->id }}" value="{{ $proDetail->name }}">
										<input type="hidden" class="cart_product_image_{{ $proDetail->id }}" value="{{ $proDetail->feature_image_path }}">
										<input type="hidden" class="cart_product_price_{{ $proDetail->id }}" value="{{ $proDetail->price }}">
										<input type="hidden" class="cart_product_qty_{{ $proDetail->id }}" value="1">

									<span>{{ number_format((float)$proDetail->price,0,',','.') }} vnd</span>
									
									<button type="button" 
									data-id="{{ $proDetail->id }}"
									class="btn btn-default add-to-cart " 
									name="add-to-cart"><i class="fa fa-shopping-cart"></i>
										 Thêm vào giỏ hàng</button>
									</form>	
								</span>

								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New 100%</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<!-- <li ><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> -->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!! $proDetail->content !!}</p>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								@foreach($tagProduct as $tags)
								<a class="btn btn-default check_out" href="{{ route('showTag', ['id' => $tags->id]) }}">{{ $tags->name }}</a>
								@endforeach
							</div>
							
							
						</div>
					</div><!--/category-tab-->
				@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach( $productRecomment as $keyRecomment => $recommentItem )
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
													<div class="productinfo text-center">
														<form>
															@csrf
															<input type="hidden" class="cart_product_id_{{ $recommentItem->id }}" value="{{ $recommentItem->id }}">
															<input type="hidden" class="cart_product_name_{{ $recommentItem->id }}" value="{{ $recommentItem->name }}">
															<input type="hidden" class="cart_product_image_{{ $recommentItem->id }}" value="{{ $recommentItem->feature_image_path }}">
															<input type="hidden" class="cart_product_price_{{ $recommentItem->id }}" value="{{ $recommentItem->price }}">
															<input type="hidden" class="cart_product_qty_{{ $recommentItem->id }}" value="1">

														<a href="{{ route('showProductDetail', ['id' => $recommentItem->id]) }}" >
															<img src="{{ asset('public'.$recommentItem['feature_image_path']) }}" alt="" style="width: 267px; height: 249px;"  />
															<h2>{{ number_format((float)$recommentItem->price,0,',','.') }} VND</h2>
															<p>{{ $recommentItem->name }}</p>
														</a>
														<button type="button"
															data-id="{{ $recommentItem->id }}"
															class="btn btn-default add-to-cart " 
															name="add-to-cart"><i class="fa fa-shopping-cart"></i>
																 Thêm vào giỏ hàng</button>
														</form>					
													</div>
													
												</div>
										</div>
									</div>
									@endforeach
								</div>
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
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

	
	
	
	
	