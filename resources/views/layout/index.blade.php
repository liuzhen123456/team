<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')列表页</title>
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
		<li><a href="">管理员管理</a></li>
					<li><a href="">业务员管理</a></li>
					<li><a href="{{url('/index')}}">拜访会议管理</a></li>
					<li><a href="">客户管理</a></li>
		</ul>
	</div>
	</div>
</nav>
@yield('content')
</body>
</html>
