<!DOCTYPE html>
<html>	
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="/css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});	  
});
</script>
 <!--SIGN UP-->
 <h1>欢迎登录</h1>
<div class="login-form">
	<div class="close"> </div>
		<div class="head-info">
			<label class="lbl-1"> </label>
			<label class="lbl-2"> </label>
			<label class="lbl-3"> </label>
		</div>
	<div class="clear"> </div>
	<div class="avtar">
		<img src="images/avtar.png" />
	</div>
		<form action="{{url('/login_do')}}" method="post">
				@csrf
			<input type="text" class="text"  name="account" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
			<div class="key">
				<input type="password" value="Password"  name="pass" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
			</div>
			
			<div class="signin">
				<input type="submit" value="Login" >
				<br><br>
				<a href="{{url('pass')}}">忘记密码</a>&nbsp;&nbsp;<a href="{{url('changepass')}}">修改密码</a><br>
				<a href="{{url('reg')}}">注册</a>
			</div>
		</form>
</div>
 
</body>
</html>