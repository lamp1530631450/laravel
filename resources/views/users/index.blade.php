<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>取值---数据库</h1>
	<table border="1" width="500px">
		<tr>
			<td>ID</td>
			<td>用户名</td>
			<td>手机号</td>
			<td>邮箱</td>
			<td>操作</td>

		</tr>
		@foreach($data as $k => $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->uname}}</td>
				<td>{{$v->phone}}</td>
				<td>{{$v->email}}</td>
				<td>
					<form action="/users/{{$v->id}}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除" >
					</form>
				</td>
				<td><a href="/users/{{$v->id}}/edit">修改</a></td>
			</tr>
		@endforeach
	</table>
</body>
</html>