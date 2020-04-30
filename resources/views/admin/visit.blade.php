@extends('layout.index')
@section('title', '拜访管理')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form class="form-horizontal" role="form" action="{{url('/visadd')}}" method="post">
 <a href="{{url('/vislist')}}">列表</a>
@csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">业务员姓名</label>
    <div class="col-sm-10">
     <select name="sale_id" id="">
     <option value="">--请选择--</option>
     @foreach($salesman as $v)
        <option value="{{$v->sale_id}}">{{$v->sale_name}}</option>
     @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">客户名称</label>
    <div class="col-sm-10">
    <select name="cust_id" id="">
     <option value="">--请选择--</option>
     @foreach($custom as $v)
        <option value="{{$v->cust_id}}">{{$v->cust_name}}</option>
     @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_time" placeholder="请输入客户名称">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问人</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_name"  placeholder="请输入访问人">
      <span id="200"></span>
      {{$errors->first("vis_name")}}
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_url" placeholder="请输入访问地址">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问详情</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_desc" placeholder="请输入访问详情">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">下次访问时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_uptime" placeholder="请输入客户名称">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>
@endsection
<script src="/static/jquery.js"></script>
<script>
$(document).on("blur","#lastname",function(){
  var _this=$(this);
  var name=_this.val();
  $.ajaxSetup({
        headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr("content")}
    })
    $.get("/visname",{name:name},function(res){
      if(res==="no"){
        $("#200").html("该访问人已访问");
      }else{
        $("#200").html("√");
      }
    });
})
</script>	