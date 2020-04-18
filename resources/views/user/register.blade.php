<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
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
		<!-- end site brand	 -->
	</div>
	<!-- end navbar top -->
	
	<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>注册</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12" method="post" action="{{url('doreg')}}">
						@csrf
						<div class="input-field">
							<input type="text" class="validate" name="name" placeholder="用户名">
							<b style="color:red"> @php echo $errors->first('name'); @endphp </b>
						</div>
						<div class="input-field">
							<input type="text" placeholder="请输入手机号" name="mibble" class="validate">
							<b style="color:red"> @php echo $errors->first('mibble'); @endphp </b>
						</div>
						<div class="input-field">
							<input type="text" placeholder="邮箱" name="email" class="validate" >
							<b style="color:red"> @php echo $errors->first('email'); @endphp </b>
						</div>
						<div class="input-field">
							<input type="password" placeholder="请输入密码" name="pass" class="validate" >
							<b style="color:red"> @php echo $errors->first('pass'); @endphp </b>
						</div>
						<div class="input-field">
							<input type="password" placeholder="确认密码" name="passs" class="validate">
							<b style="color:red"> @php echo $errors->first('passs'); @endphp </b>
						</div>
						<input type="submit" class="btn button-default" value="注册" > <br>
						<a href="{{url('/login')}}">登录</a>
					</form> 
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->
	

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