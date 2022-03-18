@extends('layouts.master')

@section('title')
  <title>Máy ảnh Twenty</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('public/homes/home.css') }}">
@endsection

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('home') }}">Home</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
			@if(session()->has('message'))
				<div class="alert alert-danger">
					{{ session()->get('message') }}
				</div>
			@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{{ session()->get('error') }}
				</div>
			@endif

			@if(Session::get('cart') == true)
				@include('home.product.cart.cart_component')
			@else
				@include('home.product.cart.cart_empty')
			@endif
 
@endsection

@section('js')
  

@endsection