<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1> 表单 </h1>
	<form action="/users/{{$data->id}}" method="post">
		{{ csrf_field() }}
		{{method_field('PUT')}}
		用户名：<input type="text" name="uname" value="{{$data->uname}}"><br/>
		电话:<input type="text" name="phone" value="{{$data->phone}}"><br/>
		邮箱:<input type="text" name="email" value="{{$data->email}}"><br/>
		<input type="submit" value="提交" >
	</form>
</body>
</html>