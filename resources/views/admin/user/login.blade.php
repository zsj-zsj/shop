<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>登陆</title>
</head>
<body>

	<form action="{{url('admin/login_do')}}" method="post">
		@csrf
		账号:<input type="text" name="account" placeholder="用户名/邮箱/电话"><br>
	    密码:<input type="password" name="pass"><a href="">忘记密码</a><br>
	    <input type="submit" value="登录">
	</form>

</body>
</html>