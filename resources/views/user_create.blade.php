<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>user_create --- post</h1>
	<form action="/user/store" method="post">
		{{ csrf_field()}}
		用 户&nbsp; &nbsp;名:<input type="text" name="uname" value=""><br/>
		密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:<input type="password" name="pwd" value=""><br/>
		确认密码:<input type="password" name="upwd" value=""><br/>
		<input type="submit" value="提交">

	</form>

	<h1>闪存 --- put</h1>
	<form action="/user/insert2" method="post">
		{{ csrf_field()}}
		{{ method_field('PUT')}}
		用 户&nbsp; &nbsp;名:<input type="text" name="uname" value="{{ old('uname')}}"><br/>
		密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:<input type="password" name="pwd" value="{{ old('pwd')}}"><br/>
		确认密码:<input type="password" name="upwd" value="{{old('upwd')}}"><br/>
		手机:<input type="text" name="phone" value="{{old('phone')}}"><br/>
		<input type="submit" value="提交">

	</form>
</body>
</html>