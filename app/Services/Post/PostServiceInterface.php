<?php

namespace App\Services\Post;

interface PostServiceInterface{
    public function store($data);
    public function update($data, $post);
}
