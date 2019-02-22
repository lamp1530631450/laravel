<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //取数据
       $data =  DB::select('select * from user');
        return view('users.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $data = $request ->except(['_token']); 
        // dd($res); 
        $res = DB::insert('insert into user (uname,phone,email) value(:uname,:phone,:email)',$data);
        // dump($db); 
        if($res){
            echo '<script>alert("添加成功");location.href="/users"</script>';
        }else{
             echo '<script>alert("添加失败");location.href="/users/create"</script>';
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
       $data = DB::select('select * from user where id = ?',[$id]);
       // dd($data);
       return view('users.update',['data'=>$data[0]]);
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
        $res = $request->except('_token','_method');
        // dd($res);
        $res['id']=$id;
        // dd($res);
       $data = DB::update('update user set uname=:uname,phone=:phone,email=:email where id =  :id',$res);

       if($data){
            echo '<script>alert("修改成功");location.href="/users"</script>';
        }else{
            echo '<script>alert("修改失败");location.href="/users"</script>';
       
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
        $res = DB::delete('delete from user where id = ?',[$id]);

         if($res){
            echo '<script>alert("删除成功");location.href="/users"</script>';
        }else{
             echo '<script>alert("删除失败");location.href="/users"</script>';
        }
    }
}
