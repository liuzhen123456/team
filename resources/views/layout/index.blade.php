<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">菜鸟教程</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="{{url('user/index')}}">系统管理</a>
			</li>
			
			
		</ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('/login/register')}}"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
      <li><a href="{{url('/login/index')}}"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
    </ul>
	</div>
	</div>
</nav>
@yield('content')
</body>
</html>
