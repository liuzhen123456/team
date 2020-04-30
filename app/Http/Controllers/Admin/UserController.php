<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Custom;
use App\Salesman;
use App\Visit;
class UserController extends Controller
{
//    首页
    public function index()
    {
        $custom=Custom::get();
        $salesman=Salesman::get();
       return view("admin.visit",['custom'=>$custom,'salesman'=>$salesman]);
    }
    // 添加
    public function visadd(Request $request){
        $data=request()->except(['_token']);
        $request->validate([
            "vis_name"=>"required|unique:visit|regex:/^[\x{4e00}-\x{9fa5}\w]{3,20}$/u",
        ],[
            "vis_name.required"=>"名称不能为空",
            "vis_name.unique"=>"名称已有",
            "vis_name.regex"=>"名称是中文",
        ]);
        // dd($data);
        $data['vis_time']=time();
        $data['vis_uptime']=time();
        $res=Visit::insert($data);
        if($res){
            return redirect("/vislist");
        }
    }
    // 展示
    public function vislist(){
        $vis_name=request()->vis_name;
        $where=[];
        if($vis_name){
            $where[]=['vis_name','like',"%$vis_name%"];
        }
        $res=Visit::where($where)
        ->leftjoin("Custom","visit.cust_id",'=',"custom.cust_id")
        ->leftjoin("Salesman","visit.sale_id",'=','salesman.sale_id')
        ->paginate(3);

        return  view("admin.vislist",['res'=>$res,'vis_name'=>$vis_name]);
    }
    // 删除
    public function visdele($id){
        $res=Visit::destroy($id);
        if($res){
            return redirect("/vislist");
        }
    }
    // 修改展示
    public function visup($id){
        $res=Visit::find($id);
        $custom=Custom::get();
        $salesman=Salesman::get();
        return view("admin.visup",['res'=>$res,'custom'=>$custom,'salesman'=>$salesman]);
    }
    // 修改
    public function visupdate(Request $request ,$id){
        $data=request()->except(['_token']);
        $res=Visit::where("vis_id",$id)->update($data);
        if($res){
            return redirect("/vislist");
        }
    }
    // 唯一邢
    public function visname(){
        $name=request()->name;
        // dd($name);
        $res=Visit::where("vis_name",$name)->first();
        if($res){
            echo"no";
        }else{
            echo"ok";
        }
    }
    // 基点既改
    public function visgai(){
        $id=request()->id;
        $zi=request()->zi;
        $val=request()->val;
        $res=Visit::where("vis_id",$id)->update([$zi=>$val]);
        if($res===false){
            echo"no";
        }else{
            echo"ok";
        }


    }
}
