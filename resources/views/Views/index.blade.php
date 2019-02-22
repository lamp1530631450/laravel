<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>index页面</h1>
	<h1>姓名:{{ $name }}</h1>
	<h1>标签:{!!$str !!}</h1>
	<h1>默认值:{{ $str1 or 'default value'}}</h1>
	<p>{{ date('Y-m-d H:i:s',time()) }}</p>

	@if($a == 1)
	<button>登陆</button>
	@elseif($a == 2)
	<button>未登陆</button>
	@else
	<button>未知</button>
	@endif

	<p>三元运算符</p>
	{{ $a == 1 ? 'true' : false }}

	<p>for循环</p>
	@for($i = 1;$i<6;$i++)
	{{ $i }}

	@endfor

	<p>foreach 循环</p>
	@foreach($data as $k => $v)
		{{ $v['uname']}}
		{{ $v['sex']}}
		{{ $v['age']}}
	@endforeach
</body>
</html>