@extends('layout.index')
@section('title', '拜访管理')
@section('content')
<h4><a href="{{url('/index')}}">拜访记录表</a></h4>
<form>
访问人: <input type="text"name="vis_name"value="{{$vis_name}}">
<button>搜索</button>       
</form>

<table class="table table-striped">
	<caption></caption>
	<thead>
		<tr>
        <th>id</th>
        <th>业务员</th>
        <th>客户名称</th>
        <th>访问人</th>
        <th>访问时间</th>
        <th>下次访问时间</th>
        <th>访问地址</th>
        <th>访问详情</th>
        <th>操作</th>
        </tr>
	</thead>
	<tbody>
    @foreach($res as $v)
    <tr id="{{$v->vis_id}}">
        <td>{{$v->vis_id}}</td>
        <td>{{$v->cust_name}}</td>
        <td>{{$v->sale_name}}</td>
        <td zi="vis_name">
        <span class="aa">{{$v->vis_name}}</span>
        <input type="text" value="{{$v->vis_name}}" style="display: none;" class="bb">
        </td>
        <td>{{$v->vis_time}}</td>
        <td>{{$v->vis_uptime}}</td>
        <td>{{$v->vis_url}}</td>
        <td>{{$v->vis_desc}}</td>
        <td><a  href="{{url('/visdele/'.$v->vis_id)}}">删除</a>
        <a href="{{url('/visup/'.$v->vis_id)}}">修改</a>
        </td>
    </tr>
    @endforeach
		<tr>
			<td colspan="6" align="center">{{ $res->appends(['vis_name' => $vis_name])->links() }}</td>
		</tr>
			</tbody>
</table>
<script src="/static/jquery.js"></script>
<script>
$(document).on("click",".aa",function(){
    var _this=$(this);
     _this.hide();
     _this.next().show();
})
$(document).on("blur",".bb",function(){
    var _this=$(this);
    var zi=_this.parent().attr("zi");
    var id=_this.parents("tr").attr("id");
    var val=_this.val();
    $.get("/visgai",{val:val,zi:zi,id:id},function(res){
        if(res==="ok"){
             // 让兄弟节点显示
             _this.prev("span").text(val).show();
                    _this.hide();
        }
    })

})
// 无刷新分页
$(document).on("click",".page-item a",function(){
    var url=$(this).attr("href");
    $.get(url,function(res){
       $("body").html(res);
    });
    return false;
})
</script>



@endsection