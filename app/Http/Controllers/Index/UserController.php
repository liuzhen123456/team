<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login;
use Validator;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_name=request()->user_name;
        $where=[];
        if($user_name){
            $where[]=["user_name","like","%$user_name%"];
        }
        $res=Login::where($where)->paginate(2);
        return view('admin.index',['res'=>$res,'user_name'=>$user_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $res=Login::find($id);
        //dump($res);
        return view('admin.update',['res'=>$res]);
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
        $post=$request->except('_token');
        //dump($post) ;die;
        $Validator=Validator::make($post,[
            'user_name'=>[
                'required',
                Rule::unique('user')->ignore($id,'user_id'),
            ],
            'user_pwd'=>'required',
            'user_del'=>'required',
            'user_tel'=>'required'
        ],[
            'user_name.required'=>"账号必填",
            'user_name.unique'=>"已存在",
            'user_pwd.required'=>"密码必填",
            'user_del.required'=>"权限必填",
            'user_tel.required'=>"电话必填",
            
        ]);
        if($Validator->fails()){
            return redirect('user/update/'.$id)->withErrors($Validator)->withInput();
        }
        $res=Login::where('user_id',$id)->update($post);
        if($res!==false){
            return redirect('user/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Login::destroy($id);
        //dd($res);
        if($res){
            return redirect('user/index');
        }
    }
}
