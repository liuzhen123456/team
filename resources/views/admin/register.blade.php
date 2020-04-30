@extends('layout.index')
 @section('title', '后台管理')
    @section('content')
		

	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form"method="get">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
				   placeholder="请输入密码 密码应为6-15位"name="user_pwd">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">确认密码</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="user_repwd"
				   placeholder="请输入密码"name="user_repwd">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">手机号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_tel" 
				   placeholder="请输入手机号"name="user_tel">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button id="submit" class="btn btn-default">注册</button>
		</div>
	</div>
</form>


<script >
	$(document).on("click","#submit",function(){
		//获取账号 密码 确认密码 手机号码的值
		var user_name=$("#user_name").val();
		var user_pwd=$("#user_pwd").val();
		var user_repwd=$("#user_repwd").val();
		var user_tel=$("#user_tel").val();
		console.log(user_name);
		console.log(user_pwd);
		console.log(user_repwd);
		console.log(user_tel);
		//return false;
		if(user_name==""){
			alert('账号不能为空');
			return false;
		}
		var p=/^[A-Za-z0-9]{6,15}$/;
		if(user_pwd==""){
			alert('密码不能为空');
			return false;
		}else if(!p.test(user_pwd)){
                    alert("密码最少6位最多15位");
                    return false;
               }

		if(user_repwd==""){
			alert('确认密码不能为空');
			return false;
		}
		if(user_tel==""){
			alert('手机号不能为空');
			return false;
		}
		if(user_pwd!=user_repwd){
			alert("密码与确认密码不一致");
			return false;
		}
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		$.get(
				"/login/register_do",
				{user_name:user_name,user_pwd:user_pwd,user_tel:user_tel},
				function(res){
					if(res.code=="000"){
						location.href="{{url('/login/index')}}";
						alert(res.msg);
					}else{
						alert(res.msg);
					}
				},
				'json',
			);
		return false;
	});

</script>
@endsection