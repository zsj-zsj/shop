<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>登陆</title>
</head>
<body>

	<form action="{{url('/login_do')}}" method="post">
		@csrf
		账号:<input type="text" name="account" placeholder="用户名/邮箱/电话"><br>
	    密码:<input type="password" name="pass">
	    <input type="submit" value="登录">
	</form>
	<a href="{{url('pass')}}">忘记密码</a>&nbsp;&nbsp;<a href="{{url('changepass')}}">修改密码</a><br>
	<a href="{{url('reg')}}">注册</a>
</body>
</html>