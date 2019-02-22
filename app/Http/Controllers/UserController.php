<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use DB;
class UserController extends Controller
{
    public function index(Request $request)
    {
    	echo 'qqqq';
    	//请求路径
    	dump($request -> path());
    	//检查路径是否存在
    	dump($request -> is('admin'));
    	//获取完整的url
    	dump($request -> url());
    	//获取请求方式
    	dump($request -> method());
    	//检测当前请求方式
    	dump($request -> isMethod('get'));
    	
    }

    /**
     * 加载视图
     * @return [type] [description]
     */
    public function create()
    {
    	return view('user_create');
    }

    /**
     * 处理添加
     * @return [type] [description]
     */
    public function store(Request $request)
    {
    	var_dump($_POST);
    	//检测字段是否存在
    	dump($request -> has('name'));
    	//检测字段的值 是否为空
    	dump($request -> filled('name'));
    	//获取请求参数
    	dump($name = $request -> input('name'));
    	//默认值设置
    	dump($request -> input('name','n'));
    	//获取所有参数
    	dump($request -> all());
    	//获取指定
    	dump($request -> only(['uname']));
    	//除了指定的获取其他的
    	dump($request -> except(['uname']));
    }

    public function insert2(Request $request)
    {
    	if(!$request -> filled('uname')){
    		//将所有的数据压入到闪存中
    		$request->flash();
    		// 选择性存储
    		// $request->flashOnly('phone');
    		//将某些值去除后存到闪存中
        	// $request->flashExcept('phone');
        	// dump($request->all());
        	// 简便使用
        	// return back()->withInput();
    		return back();
    	}
    	dump($request->all());
    	
    }

       public function setinfo()
    {
        echo '设置';
        //第一种cookie存储方法
        // return response('')->withCookie('admin_uid','val_值',10);
        // 第二种cookie存储方法
        // dump(Cookie::queue('name','iloveyou',10));
        
        // session存储方法
        session(['key'=>'value']);
    }

    public function getinfo(Request $request)
    {
    	//第一种cookie读取方法
    	// dump($request->cookie('admin_uid'));
    	// 第二种cookie读取方法
    	// dump(Cookie::get('name'));
    	
    	// 获取：session方法
    	 dump(session('key'));
        // echo 'get';
    }

    //加载试图
    public function profile()
    {
    	return view('user_profile');
    }

    //单文件执行文件上传
    public function upload(Request $request)
    {
    	
    	//执行上传文件   storage/app/image
    	// $res = $file -> store('public');
    	// dump($res);
    	//判断上传时是否有文件
    	if ($request->hasFile('profile')) {
            //file 创建文件上传对象
    		$file = $request -> file('profile');
       
	    	//获取文锦后缀  extension
	    	$ext = $file->extension();
	    	//执行上传文件 修改名称
	    	// $res = $file -> storeAs('public',time()+rand(1000,9999).'.'.$ext); 
	    	$file_name = time()+rand(1000,9999).'.'.$ext;
	    	//storeAs  文件上传时 修改上传的文件名
	        $res = $file->storeAs('public',$file_name);
	    	dump($res);
    	}else{
    		return back();
    	}
    }

    public function upload2(Request $request)
    {	//打印上传对象
    	$res = $request -> file('profile');
    	//遍历图片
    	foreach ($res as $key => $value) {
    		$res = $value -> store('public');
    		dump($res);
    		echo "<br/>";
    	}
    }

 
}
