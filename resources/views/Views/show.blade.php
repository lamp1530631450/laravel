<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.header{
			width:100%;
			height:300px;
			background-color: #222222;
		}
		.content{
			width:100%;
			height:500px;
			background-color: #1B2B34;
		} 
		.footer{
			width:100%;
			height:300px;
			background-color: #E9C341;
		}
	</style>
</head>
<body>
	<div class="header"></div>
	<div class="content">show1
		@section('content')

		@show

	</div>
	<div class="footer"></div>
</body>
</html>