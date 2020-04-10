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
 <h1>欢迎注册</h1>
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
		<form action="{{url('/doreg')}}" method="post">
				@csrf
			<input type="text" name="name" class="text" placeholder="请输入用户名"> <br>
			<b style="color:red"> @php echo $errors->first('name'); @endphp </b>
			<input type="text" name="mibble"class="text" placeholder="请输入手机号"> <br>
			<b style="color:red"> @php echo $errors->first('mibble'); @endphp </b>
			<input type="text" name="email" class="text" placeholder="请输入邮箱"> <br>
			<b style="color:red"> @php echo $errors->first('email'); @endphp </b>
			<input type="password" name="pass" class="text" placeholder="设置密码"> <br>
			<b style="color:red"> @php echo $errors->first('pass'); @endphp </b>
		 	<input type="password" name="passs" class="text" placeholder="确认密码"> <br>
		 	<b style="color:red"> @php echo $errors->first('passs'); @endphp </b>
         {{-- <input type="password" name="passs"  class="text" placeholder="确认密码" id="pw2" onkeyup="validate()"/><span id="tishi"></span> --}}
			<div class="signin">
            <input type="submit" value="注册" > <br>
            <a href="{{url('/login')}}">登录</a>
			</div>
      </form>   
</div>
 
{{-- <script>
   function validate() {
   var pw1 = document.getElementById("pw1").value;
   var pw2 = document.getElementById("pw2").value;
   if(pw1 == pw2) {
   document.getElementById("tishi").innerHTML="<font color='green'>两次密码相同</font>";
   document.getElementById("submit").disabled = false;
   }
   else {
   document.getElementById("tishi").innerHTML="<font color='red'>两次密码不相同</font>";
   document.getElementById("submit").disabled = true;
   }
   }
</script> --}}
</body>
</html>