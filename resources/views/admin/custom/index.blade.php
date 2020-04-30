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
<center><h2>客户管理列表</h2><a style="float:center;" href="{{url('/custom/create')}}" class="btn btn-success">客户管理添加</a><hr /></center>
<form>
      <input type="text" name="cust_name" placeholder="请输入客户名称关键字">
      <input type="text" name="cust_rank" placeholder="请输入客户级别关键字">
      <button>搜索</button>
</form>
<table class="table table-striped">
 	<thead>
		<tr>
			<th>客户id</th>
			<th>客户名称</th>
			<th>客户级别</th>
			<th>客户来源</th>
			<th>业务员名称</th>
			<th>客户电话</th>
			<th>客户手机</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
	@foreach($custom as $v)
		<tr>
			<td>{{$v->cust_id}}</td>
			<td>{{$v->cust_name}}</td>
			<td>{{$v->cust_rank}}</td>
			<td>{{$v->cust_from}}</td>
			<td>{{$v->sale_name}}</td>
			<td>{{$v->cust_phone}}</td>
			<td>{{$v->cust_tel}}</td>
			<td>	
				<a href="{{url('/custom/edit/'.$v->cust_id)}}" class="btn btn-primary">客户管理编辑</a>
				<a href="{{url('/custom/destroy/'.$v->cust_id)}}" class="btn btn-danger">客户管理删除</a>
			</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="8">{{$custom->links()}}</td>
	</tr>
	</tbody>
</table>

</body>
</html>