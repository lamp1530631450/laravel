<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<h1>添加</h1>
	<form action="/admin/insert" method="post">
		{{ csrf_field() }}
		用户名：<input type="text" name="uname" value=""><br/>
		密&nbsp;&nbsp;码:<input type="password" name="pwd" value=""><br>
		<input type="submit" value="提交">
	</form>

	<h1>ajax scrf</h1>
	<button>点击发送ajax --- post</button>
	<script type="text/javascript" src="/jquery/jquery_mini.js"></script>
	<script type="text/javascript">
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
		$('button').eq(0).click(function(){
			$.post('/admin/insert2',function(msg){
				alert(msg);
			})
		});
	</script>
</body>
</html>