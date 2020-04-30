<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //注册
    public function register()
    {
        return view('admin.register');
    }
    //执行注册
    public function register_do(Request $request)
    {
        //dd($request);
       $user_name=Request()->user_name;
       $user_pwd=Request()->user_pwd;
       $user_tel=Request()->user_tel;
       $res=Login::where("user_name",$user_name)->first();
       //dd($res);
       //echo $user_name,$user_pwd,$user_tel;
       if($user_name==""){
            echo json_encode(['code'=>"001","msg"=>"账号不能为空"]);exit;
       }else if($res){
            echo json_encode(['code'=>"001","msg"=>"账号已存在"]);exit;
       }
       $reg='/^1[3|5|8|9]\d{9}$/';
       if($user_tel==""){
            echo json_encode(['code'=>"001","msg"=>"手机号不能为空"]);exit;
       }
        
        if(!preg_match($reg,$user_tel)){
            echo json_encode(['code'=>"001","msg"=>"手机号格式错误"]);exit;
        }
        $p="/^[A-Za-z0-9]{6,15}$/";
        if(!preg_match($p,$user_pwd)){
            echo json_encode(['code'=>"001","msg"=>"手机号格式错误"]);exit;
        }
        $data=[
            "user_name"=>$user_name,
            "user_pwd"=>$user_pwd,
            "user_tel"=>$user_tel,
        ];
        $user=Login::insert($data);
        if($user==true){
            echo json_encode(['code'=>"000","msg"=>"注册成功"]);
        }else{
            echo json_encode(['code'=>"001","msg"=>"注册失败"]);exit;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login_do(Request $request)
    {
        //dd($request);
        $post=$request->except('_token');
        //dd($post);
        $user_name=$post['user_name'];
        $user_pwd=$post['user_pwd'];
        //dd($user_name);
        $userInfo=Login::where('user_name',$user_name)->first();
        //echo $userInfo;
        if($userInfo){
            //验证密码
            if($userInfo['user_pwd']!=$user_pwd){
                 echo json_encode(['code'=>"002","msg"=>"账号密码错误"]);exit;
            }else{
                 echo json_encode(['code'=>"000","msg"=>"登陆成功"]);
                 session(['userInfo'=>$userInfo]);
            }
        }else{
           echo json_encode(['code'=>"002","msg"=>"账号密码错误"]);exit;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
