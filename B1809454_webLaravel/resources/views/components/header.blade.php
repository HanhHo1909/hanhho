<style type="text/css">
		#biatrang{

		    width: 1240px;
		    height: 130px;
		    margin-top: -20px;
		    margin-left: -55px;

		}
		
	</style>
<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> {{ getConfigFromSetting('phone_contact') }}</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigFromSetting('gmail_contact') }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="{{ getConfigFromSetting('facebook_link') }}">
								<i class="fa fa-facebook"></i></a>
							</li>
							<li><a href="#">
								<i class="fa fa-twitter"></i></a>
							</li>
							<li><a href="#">
								<i class="fa fa-linkedin"></i></a>
							</li>
							<li><a href="#">
								<i class="fa fa-dribbble"></i></a>
							</li>
							<li><a href="#">
								<i class="fa fa-google-plus"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->
	
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-md-4 clearfix">
					<div class="logo pull-left">
						<a href=""><img id="biatrang" src="{{ asset('public/admins/anhdaidien/bia.jpg') }}" alt="" /></a>
					</div>
					
				</div>
				
			</div>
		</div>
	</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8">

					<!--/header-main-menu-->
						@include('components.main_menu')
					<!--/header-main-menu-->

				</div>
				<div class="col-sm-4">
					<form action="{{ route('searchProduct') }}" method="POST">
						{{ csrf_field() }}
					<div class="pull-right">
						<input type="text" name="keywords_submit" style="border: none; height: 28px;margin-top: -4px; font-family: arial; font-size: 16px; background-color: #edb6e49e;" placeholder="Tìm kiếm"/>
						<input type="submit" style="margin-top: -4px; font-size: 13px; background: purple;" name="search_items" class="btn btn-primary btn-sm" value="Search" />
					</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->