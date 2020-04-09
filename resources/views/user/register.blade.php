<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册表单</title>
</head>
<body>
    <form action="{{url('/doreg')}}" method="post">
    @csrf
        <table>
            <tr>
               <td>用户名</td> 
               <td><input type="text" name="name"></td>
            </tr>
            <tr>
               <td>手机号</td> 
               <td><input type="text" name="mibble"></td>
            </tr>
            <tr>
               <td>email</td> 
               <td><input type="text" name="email"></td>
            </tr>
            <tr>
               <td>密码</td> 
               <td><input type="password" name="pass" id="pw1"></td>
            </tr>
            <tr>
               <td>确认密码</td> 
               <td><input type="password" name="passs" id="pw2" onkeyup="validate()"/><span id="tishi"></span></td>
            </tr>
            <tr>
				<td><input type="submit" value="提交"></td>
				<td></td>
			</tr>
        </table>
        <a href="{{url('/login')}}">登录</a>
    </form>
        <script>
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
        </script>
</body>
</html>