<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //列表
    public function index(){
//        $post = Post::aviable()->orderBy("created_at", "desc");
        return view("post/index");
    }

    //详情页面
    public function show(){
        return view("post/show");
    }

    public function create(){
        return view("post/create");
    }

    //创建
    public function store(){
        return ;
    }

    //编辑 页面
    public function edit(){
        return view("post/edit");
    }

    //
    public function update(){

    }

    //删除
    public function delete(){

    }
}
