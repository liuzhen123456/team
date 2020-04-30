@extends('layout.index')
 @section('title', '后台管理')
    @section('content')
		<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form"method="post"action="{{url('user/edit/'.$res->user_id)}}">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">账号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_name" 
				   placeholder="请输入账号"name="user_name"value="{{$res->user_name}}">
				   <span>{{$errors->first('user_name')}}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="user_pwd" 
				   placeholder="请输入密码"name="user_pwd"value="{{$res->user_pwd}}">
				   <span>{{$errors->first('user_pwd')}}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_pwd" 
				   placeholder="请输入密码"name="user_tel"value="{{$res->user_tel}}">
				   <span>{{$errors->first('user_tel')}}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">修改权限</label>
		<div class="col-sm-10">
			<input type="radio" value=1 name="user_del">系统管理员
			<input type="radio" value=2 name="user_del">业务员
			<input type="radio" value=3 name="user_del">主管
			<span>{{$errors->first('user_del')}}</span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button  class="btn btn-default"type="submit">修改</button>
		</div>
	</div>
	
</form>

@endsection