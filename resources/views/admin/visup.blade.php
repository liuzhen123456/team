@extends('layout.index')
@section('title', '拜访管理')
@section('content')
<form class="form-horizontal" role="form" action="{{url('/visupdate/'.$res->vis_id)}}" method="post">
@csrf
  
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">业务员姓名</label>
    <div class="col-sm-10">
     <select name="sale_id" id="">
     <option value="">--请选择--</option>
     @foreach($salesman as $v)
        <option value="{{$v->sale_id}}"{{$res->sale_id==$v->sale_id?"selected":""}}>{{$v->sale_name}}</option>
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
        <option value="{{$v->cust_id}}"{{$v->cust_id==$res->cust_id?"selected":""}}>{{$v->cust_name}}</option>
     @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_time" value="{{$res->vis_time}}" placeholder="请输入客户名称">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问人</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_name"value="{{$res->vis_name}}"  placeholder="请输入访问人">
      {{$errors->first("vis_name")}}
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname"value="{{$res->vis_url}}" name="vis_url" placeholder="请输入访问地址">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">访问详情</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_desc" value="{{$res->vis_desc}}"  placeholder="请输入访问详情">

    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">下次访问时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="vis_uptime" value="{{$res->vis_uptime}}"  placeholder="请输入客户名称">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>

				


@endsection