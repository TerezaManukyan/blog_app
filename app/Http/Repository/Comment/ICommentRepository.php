<?php

namespace App\Http\Repository\Comment;

use App\Models\Post;

interface ICommentRepository
{
    public function create(array $data, Post $post);
}
