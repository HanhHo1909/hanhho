<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=0.1, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login admin</title>
	
	<link href="{{ asset('public/admins/login/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<style type="text/css">
		body {
		  margin: 0;
		  padding: 0;
		  background-color: #c9adc5;
		  height: 100vh;
		}
		#login .container #login-row #login-column #login-box {
		  margin-top: 50px;
		  max-width: 600px;
		  height: 320px;
		  border: 1px solid #9C9C9C;
		  background-color: #EAEAEA;
		}
		#login .container #login-row #login-column #login-box #login-form {
		  padding: 20px;
		}
		#login .container #login-row #login-column #login-box #login-form #register-link {
		  margin-top: -85px;
		}
	</style>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Đăng nhập tài khoản quản trị</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                        	@csrf
                            <h3 class="text-center text-info">Đăng nhập</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Tên đăng nhập:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mật khẩu:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Ghi nhớ</span> <span><input id="remember-me" name="remember_me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('public/admins/login/bootstrap.min.js') }}"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script src="{{ asset('public/admins/login/jquery.min.js') }}"></script>
</body>
</html>

