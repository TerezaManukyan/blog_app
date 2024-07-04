<?php

namespace App\Http\Repository\Comment;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CommentRepository implements ICommentRepository
{
    public function create(array $data, Post $post)
    {
        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->post_id = $post->id;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        $post->load(['user', 'comments']);

        Cache::forget('post_' . $post->id);

        return Cache::rememberForever('post_' . $post->id, function () use ($post) {
            return $post;
        });
    }
}
