<?php

namespace App\Http\Repository\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostRepository implements IPostRepository
{
    public function getAll(string $search): Collection
    {
        if ($search != '') {
            return Post::with('user')
                ->where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%")
                ->get();
        } else {
            return Post::with('user')->get();
        }
    }

    public function getPostById(int $id)
    {
        return Cache::rememberForever('post_'. $id, function () use($id) {
           return Post::with(['comments', 'user'])->where('id', $id)->first();
        });
    }

    public function create(array $data): Post
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    public function update(array $data, Post $post): Post
    {
        $post->update($data);

        $post->save();

        $post->load(['user', 'comments']);

        Cache::forget('post_'. $post->id);

        return Cache::rememberForever('post_'. $post->id, function () use($post) {
            return $post;
        });
    }

    public function delete(Post $post): void
    {
        Cache::forget('post_'. $post->id);

        $post->delete();
    }
}
