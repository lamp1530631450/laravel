<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>读取文件</h1>
	<img src="{{asset('storage/8mwd5Lp4KYSdw03GGHw2MnsoEhuTFmF1uUjB7k3L.jpeg')}}" width="100px">
	<h1>单文件文件上传</h1>
	<form action="/user/upload" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		文件上传:<input type="file" name="profile" value="">
		<input type="submit" value="提交">
	</form>

	<h1>多文件文件上传</h1>
	<form action="/user/upload2" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		文件上传:<input type="file" multiple name="profile[]" value="">

		<input type="submit" value="提交">
	</form>
</body>
</html>