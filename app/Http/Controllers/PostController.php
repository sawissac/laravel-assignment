<?php

namespace App\Http\Controllers;
use App\Http\Requests\BlogRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:postList',['only'=>'index']);
        $this->middleware('permission:postCreate',['only'=>'create']);
        $this->middleware('permission:postShow',['only'=>'show']);
        $this->middleware('permission:postEdit',['only'=>'edit']);
        $this->middleware('permission:postUpdate',['only'=>'update']);
        $this->middleware('permission:postDestroy',['only'=>'destroy']);
    }
    public function index()
    {
        $data = Post::all();
        return view('backend.post.index', compact('data'));
    }

    public function create()
    {
        return view('backend.post.create');
    }
    public function store(BlogRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'is_active' => $data['status'] === 'active' ? true : false,
        ]);
        return redirect()->route('post.index');
    }
    public function show(Post $post)
    {
        return view('backend.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('backend.post.edit', compact('post'));
    }

    public function update(BlogRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'is_active' => $data['status'] === 'active' ? true : false
        ]);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
