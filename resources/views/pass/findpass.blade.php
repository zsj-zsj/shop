<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>找回密码</h1>
    <form action="{{url('/doFindpass')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="请输入用户名/手机号/邮箱">
        <input type="submit" value="找回密码">
    </form>
</body>
</html>