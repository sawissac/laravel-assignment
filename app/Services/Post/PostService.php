<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostService implements PostServiceInterface
{

    public function store($data)
    {
        if (!empty($data['image'])) {
            $imageName = time() . '.' . $data['image']->extension();
            $data['image']->move(public_path('storage'), $imageName);
        }

        $data = array_merge($data, [
            'image' => empty($imageName) ? '' : $imageName,
            'is_active' => $data['status'] === 'active' ? true : false
        ]);

        return Post::create($data);
    }

    public function update($data, $post)
    {
         

        $data = array_merge($data, [
            'image' => empty($imageName) ? $post->image : $imageName,
            'is_active' => $data['status'] === 'active' ? true : false
        ]);

        $post->update($data);
    }
}
