<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>团队开发</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 
<center><h2>客户管理编辑</h2><hr /></center>

 
<form action="{{url('/custom/update/'.$custom->cust_id)}}" method="post" class="form-horizontal" role="form">
	@csrf
 	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">客户名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$custom->cust_name}}" name="cust_name" id="lastname" 
				   placeholder="请输入客户名称">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">客户级别</label>
		<div class="col-sm-10">
			<input type="radio" name="cust_rank" value="高级">高级
			<input type="radio" name="cust_rank" value="中级" checked>中级
            <input type="radio" name="cust_rank" value="初级">初级
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">客户来源</label>
		<div class="col-sm-10">
			<input type="radio" name="cust_from" value="四川成都">四川成都
			<input type="radio" name="cust_from" value="北京顺义">北京顺义
		    <input type="radio" name="cust_from" value="河北定州" checked>河北定州
 		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$custom->sale_name}}" name="sale_name" id="lastname" 
				   placeholder="请输入业务员名称">
 		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">客户电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$custom->cust_phone}}" name="cust_phone" id="lastname" 
				   placeholder="请输入客户电话">
 		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">客户手机 </label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$custom->cust_tel}}" name="cust_tel" id="lastname" 
				   placeholder="请输入客户手机 ">
 		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>