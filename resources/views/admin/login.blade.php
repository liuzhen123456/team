@extends('layout.index')
 @section('title', '后台管理')
    @section('content')
		<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form"method="post"action="login_do">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">账号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_name" 
				   placeholder="请输入账号"name="user_name">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="user_pwd" 
				   placeholder="请输入密码"name="user_pwd">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button  class="btn btn-default"id="submit">登录</button>
		</div>
	</div>
</form>
<script >
	$(document).on("click","#submit",function(){
		//alert(1234);
		var user_name=$("#user_name").val();
		var user_pwd=$("#user_pwd").val();
		console.log(user_name);
		console.log(user_pwd);
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		$.post(
			"/login/login_do",
			{user_name:user_name,user_pwd:user_pwd},
			function(res){
				if(res.code=="000"){
					location.href="{{url('user/index')}}";
					alert(res.msg);
				}else{
					alert(res.msg);
				}
			},
			'json',
			);
		//return false;
	});
	
</script>
	


@endsection