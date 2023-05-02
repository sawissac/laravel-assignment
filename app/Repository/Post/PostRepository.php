<?php

namespace App\Repository\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface{
    public function get()
    {
        return Post::with('author')->get();
    }

    public function show($id)
    {
        return Post::find($id)->with('author')->first();
    }
}
