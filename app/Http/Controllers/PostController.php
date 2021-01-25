<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Model\Post;

class PostController extends Controller
{
    //列表
    public function index(){
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view("post/index",compact('posts'));
    }

    //详情页面
    public function show(Post $post){
        return view("post/show",compact('post'));
    }

    //创建页面
    public function create(){
        return view("post/create");
    }

    //创建
    public function store(){
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ],[
            //设置参数
        ]);
        
        #方法1.
//        $post = new Post();
//        $post->title = request('title');
//        $post->content = request('content');
//        $post->save();

        #方法2.
        #$params = ['title'=>request('title'),'content'=>request('content')]; //等价下面一行
        $params = request(['title','content']);
        $post = Post::create($params);
        //dd(\request()->all());

        return redirect("/posts");
    }

    //编辑 页面
    public function edit(Post $post){
        return view('post/edit', compact('post'));
    }

    //
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:5',
        ]);

//        $this->authorize('update', $post);

        $post->update(request(['title', 'content']));
        return redirect("/posts/{$post->id}");
    }

    //删除
    public function delete(Post $post){
        //用户权限认证

        $post->delete();

        return redirect("/posts");
    }

    public function imageUpload(Request $request)
    {
        #
        $path = $request->file('wangEditorH5File')->storePublicly(md5( time()));
        return asset('storage/'. $path);
    }

}
