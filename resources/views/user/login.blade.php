<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">

	<link rel="stylesheet" href="/style/css/materialize.css">
	<link rel="stylesheet" href="/style/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/style/css/normalize.css">
	<link rel="stylesheet" href="/style/css/owl.carousel.css">
	<link rel="stylesheet" href="/style/css/owl.theme.css">
	<link rel="stylesheet" href="/style/css/owl.transitions.css">
	<link rel="stylesheet" href="/style/css/fakeLoader.css">
	<link rel="stylesheet" href="/style/css/animate.css">
	<link rel="stylesheet" href="/style/css/style.css">
	
	<link rel="shortcut icon" href="/style/img/favicon.png">

</head>
<body>

	<!-- navbar top -->
	<div class="navbar-top">
		<!-- site brand	 -->
		<div class="site-brand">
			<a href="{{env('SHOP')}}"><h1>商城</h1></a>
		</div>
	</div>
	<!-- end navbar top -->
		
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>LOGIN</h3>
			</div>
			<div class="login">
				<div class="row">
					<form action="{{url('/login_do')}}" method="post" class="col s12">
						@csrf
						<div class="input-field">
							<input type="text" name="account" class="validate" placeholder="请输入用户名/邮箱/手机号" required>
						</div>
						<div class="input-field">
							<input type="password" name="pass" class="validate" placeholder="密码" required>
						</div>
						<input type="submit" value="登录" lass="btn button-default" >
						<a href="{{url('pass')}}">忘记密码</a>&nbsp;&nbsp;<a href="{{url('reg')}}">注册</a> <br>
						<a href="https://github.com/login/oauth/authorize?client_id={{env('client_id')}}&redirect_uri={{env('PASSPORT')}}">Github登录</a>
					</form>
			</div>
		</div>
	</div>
	<!-- end login -->
	
	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="about-us-foot">
				<h6>SHOP</h6>
			</div>
			<div class="social-media">
				<a href=""><i class="fa fa-facebook"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-google"></i></a>
				<a href=""><i class="fa fa-linkedin"></i></a>
				<a href=""><i class="fa fa-instagram"></i></a>
			</div>
			<div class="copyright">
				<span>© 3131466642</span>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- scripts -->
	<script src="/style/js/jquery.min.js"></script>
	<script src="/style/js/materialize.min.js"></script>
	<script src="/style/js/owl.carousel.min.js"></script>
	<script src="/style/js/fakeLoader.min.js"></script>
	<script src="/style/js/animatedModal.min.js"></script>
	<script src="/style/js/main.js"></script>

</body>
</html>