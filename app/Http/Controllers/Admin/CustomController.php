<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Custom;
use App\Salesman;
use DB;
class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//搜索
    	$cust_name = request()->cust_name;
    	$cust_rank = request()->cust_rank;
    	$where = [];
    	if($cust_name){
    		$where[] = ['cust_name','like',"%$cust_name%"];
    	}
   
    	if($cust_rank){
    		$where[] = ['cust_rank','like',"%$cust_rank%"];
    	}

    	$pageSize = config('app.pageSize');
    	$custom = Custom::orderBy('cust_id','desc')->where($where)->paginate($pageSize);
        return view('admin.custom.index',['custom'=>$custom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.custom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = request()->except('_token');
        //dump($post);
        $res = Custom::create($post);
        if($res){
        	return redirect('/custom');
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
        $custom = Custom::find($id);
        return view('admin.custom.edit',['custom'=>$custom]);
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
        $post = request()->except('_token');
        //dd($post);
        
        $custom = Custom::find($id);
        $custom->cust_name = $post['cust_name'];
        $custom->sale_name = $post['sale_name'];
        $custom->cust_rank = $post['cust_rank'];
        $custom->cust_from = $post['cust_from'];
        $custom->cust_phone = $post['cust_phone'];
        $custom->cust_tel = $post['cust_tel'];
        $res = $custom->save();
        if($res!==false){
        	return redirect('/custom');
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
        $res = Custom::destroy($id);
        if($res){
        	return redirect('/custom');
        }
    }
}
