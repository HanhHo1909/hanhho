@extends('layouts.master')

@section('title')
  <title>Máy ảnh Twenty</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('public/homes/home.css') }}">
@endsection

@section('content')

				<!--form login-->
				<!-- <section id="form"> -->
					<div class="container">
						<div class="breadcrumbs">
							<ol class="breadcrumb">
							  <li><a href="{{ route('home') }}">Home</a></li>
							  <li class="active">Đăng ký hoặc đăng nhập</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-1">
								<!--login form-->
								<div class="login-form">
									<h2><b>Đăng nhập tài khoản</b></h2>
									<form action="{{ route('loginAccount') }}" method="POST">
										{{ csrf_field() }}
										<input type="text" name="email_account" placeholder="Email" />
										<input type="password" name="password_account" placeholder="Mật khẩu" />
										
										<button type="submit" class="btn btn-default">Đăng nhập</button>
									</form>
								</div>
								<!--/login form-->
							</div>
							<div class="col-sm-1">
								<h2 class="or">OR</h2>
							</div>
							<div class="col-sm-4">
								<!--sign up form-->
								<div class="signup-form">
									<h2><b>Đăng ký tài khoản mới</b></h2>
									<form action="{{ route('addCustomer') }}" method="POST">
										{{ csrf_field() }}
										<input type="text" name="customer_name" placeholder="Họ và tên"/>
										<input type="email" name="customer_email" placeholder="Địa chỉ email"/>
										<input type="password" name="customer_pass" placeholder="Mật khẩu"/>
										<input type="text" name="customer_phone" placeholder="Số điện thoại"/>
										<button type="submit" class="btn btn-default">Đăng ký</button>
									</form>
								</div><!--/sign up form-->
							</div>
						</div>
					</div>
					<br><br>
				<!-- </section> -->
				<!--/form-->
			
@endsection
@section('js')
  
  
   
@endsection