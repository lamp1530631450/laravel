<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GoodsController extends Controller
{
    public function index()
    {

    	//查数据库 //查询多条
    	// $data = DB::table('user')->get();   
    	//查询单条
    	// $data = DB::table('user')->first();

    	// $data = DB::table('user')->where('uname','=','得到')->orwhere('phone','=','1111')->orderBy('id','desc')->get();
    	// dump($data);
    	// 
    	// 插入数据
    	// $res = DB::table('user')->insert(['uname'=>'uname','phone'=>'phone','email'=>'email']);
    	// 
    	 // $id = DB::table('user')->insertGetId(['uname'=>'uu','phone'=>'phone','email'=>'111@ww.com']);
    	 //
    	 //修改
    	 // $res = DB::table('user')->where('id','=',24)->update(['uname'=>'24']);
    	//删除
    	// $res = DB::table('user')->where('id',24)->delete();
    	// dump($res);
    	// 
    	// 多表联查
    	$data = DB::table('user')->join('user_list as ul','user.id','=','ul.uid') 
    					 ->select('user.id', 'user.uname', 'ul.qq')
               			 ->get();
               dump($data);
    }
}
