<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Author;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:postList', ['only' => 'index']);
        $this->middleware('permission:postCreate', ['only' => 'create']);
        $this->middleware('permission:postShow', ['only' => 'show']);
        $this->middleware('permission:postEdit', ['only' => 'edit']);
        $this->middleware('permission:postUpdate', ['only' => 'update']);
        $this->middleware('permission:postDestroy', ['only' => 'destroy']);
    }
    public function index()
    {
        $data = Post::with('author')->get();
        return view('backend.post.index', compact('data'));
    }

    public function create()
    {
        $data = Author::all();
        return view('backend.post.create', compact('data'));
    }
    public function store(BlogRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
        }

        $data = array_merge($data, ['image' => $imageName]);

        $post->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'author_id' => $data['author_id'],
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
        $data = Author::all();
        return view('backend.post.edit', compact('post', 'data'));
    }

    public function update(BlogRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $data = array_merge($data, ['image' => $imageName]);

        $post->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'is_active' => $data['status'] === 'active' ? true : false,
        ]);

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
