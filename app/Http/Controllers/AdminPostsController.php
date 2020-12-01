<?php

namespace App\Http\Controllers;
use App\Models\Post;
class AdminPostsController extends Controller
{
    public function index()
    {
        #按照created_at欄位做遞減排序，印出所有資料
        $posts = Post::orderBy('created_at','DESC')->get();
        #指定posts資料表執行$posts命令
        $data = ['posts' => $posts];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }
}
