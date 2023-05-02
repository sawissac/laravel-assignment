<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Author;
use App\Models\Post;
use App\Repository\Post\PostRepositoryInterface;
use App\Services\Post\PostServiceInterface;

class PostController extends Controller
{

    private $postRepo;
    private $postService;

    public function __construct(PostRepositoryInterface $postRepo, PostServiceInterface $postService)
    {
        $this->postRepo = $postRepo;
        $this->postService = $postService;
        $this->middleware('permission:postList', ['only' => 'index']);
        $this->middleware('permission:postCreate', ['only' => 'create']);
        $this->middleware('permission:postShow', ['only' => 'show']);
        $this->middleware('permission:postEdit', ['only' => 'edit']);
        $this->middleware('permission:postUpdate', ['only' => 'update']);
        $this->middleware('permission:postDelete', ['only' => 'destroy']);
    }

    public function index()
    {
        $data = $this->postRepo->get();
        return view('backend.post.index', compact('data'));
    }

    public function create()
    {
        $data = Author::all();
        return view('backend.post.create', compact('data'));
    }

    public function store(BlogRequest $request, Post $post)
    {
        $this->postService->store($request->validated());
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $data = $this->postRepo->show($id);
        return view('backend.post.show', compact('data'));
    }

    public function edit(Post $post)
    {
        $data = Author::all();
        return view('backend.post.edit', compact('post', 'data'));
    }

    public function update(BlogRequest $request, Post $post)
    {
        $this->postService->update($request->validated(), $post);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
