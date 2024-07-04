<?php

namespace App\Http\Repository\Post;

use App\Models\Post;

interface IPostRepository
{
    public function getAll(string $search);

    public function getPostById(int $id);

    public function create(array $data);

    public function update(array $data, Post $post);

    public function delete(Post $post);
}
