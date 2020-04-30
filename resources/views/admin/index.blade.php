@extends('layout.index')
 @section('title', '后台管理')
    @section('content')
<form>
	<input type="text"name="user_name"value="{{$user_name}}">
	<input type="submit" value="搜索">
</form>		

<table border="1px">

<tr>
	<td>管理员ID</td>
	<td>管理员账号</td>
	<td>密码</td>
	<td>管理员权限</td>
	<td>管理员电话</td>
	<td>操作</td>
</tr>
@foreach ($res as $v)
<tr>
	<td>{{$v->user_id}}</td>
	<td>{{$v->user_name}}</td>
	<td>{{$v->user_pwd}}</td>
	<td>{{$v->user_del==2?"业务员":''}}
		{{$v->user_del==1?"系统管理员":''}}
		{{$v->user_del==3?"主管":''}}
	</td>
	<td>{{$v->user_tel}}</td>
	

	
	<td>
		<a href="{{url('user/update/'.$v->user_id)}}">修改</a>
		<a href="{{url('user/del/'.$v->user_id)}}">删除</a>
	</td>
</tr>
@endforeach	

</table>
{{ $res->appends(['user_name' => $user_name])->links() }}


@endsection