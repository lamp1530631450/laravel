<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * 路由
 * HTTP希望以的一种表示方式
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/abc',function(){
	echo 'aaaaa';
	// dd('sssssssss');  第一个是dump 打印 第二个d是die死亡 以下代码不执行
	dump(date('Y-m-d H:i:s',time()));
});

Route::get('/info',function(){
	//存储一条数据至session中
	session(['admin_login' => false]);
	//route 内置方法 使用别名 创建url地址
	dump(route('agd'));
	dump(route('gd'));
	//打印config目录中app文件中的timezone方法  以get方法
	dump(Config::get('app.timezone'));
	dump(Config::get('app.locale'));
});

//带参数的路由
Route::get('admin/user/delete/{id}',function($id){
	dump('删除-----'.$id);
})->where('id','[0-9]+');  
//where 限定参数 第一个参数限定的方式  第二个参数限定的条件

//  如果post请求的话  表单提交
Route::get('home/user/insert/{uname}',function($uname){
	dump('添加 ----'.$uname);
})->where('uname','[a-z]+');


//带别名的路由  第一种
Route::get('admin/goods/delete',['as'=>'agd','uses'=>function(){
    dump('商品删除');   
}]);
//带别名的路由 第二种
Route::get('admin/goods/delete2',function(){
    dump('商品删除22222222');   
})->name('gd');


//csrf
Route::get('admin/add',function(){
	return view('admin_add');
});
Route::post('admin/insert',function(){
	dump($_POST);
});
Route::post('admin/insert2',function(){
	echo 'ajax';
});





//制定用户路由
Route::get('user/index','UserController@index');
Route::get('user/create','UserController@create');
Route::post('user/store','UserController@store');
Route::put('user/insert2','UserController@insert2');

//设置session cookie
Route::get('user/setinfo','UserController@setinfo');
Route::get('user/getinfo','UserController@getinfo');

//文件上传
Route::get('user/profile','UserController@profile');
Route::post('user/upload','UserController@upload'); //单文件
Route::post('user/upload2','UserController@upload2');//多文件

// //资源控制器
// Route::get('articles/download','ArticlesController@download');
// Route::resource('articles','ArticlesController');

//分配数据到模板
Route::get('Views/index','ViewsController@index');
Route::get('Views/show','ViewsController@show');

//数据库操作
// Route::get('index/index','IndexAontroller@index');
// Route::get('index/show','IndexAontroller@show');

Route::resource('users','UsersController');

Route::get('index/index','IndexController@index');
Route::get('index/show','IndexController@show');

Route::get('goods/index','GoodsController@index');

//后台文章
Route::resource('articles','ArticlesController');


