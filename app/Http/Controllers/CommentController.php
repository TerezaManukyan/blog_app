<?php

namespace App\Http\Controllers;

use App\Http\Repository\Comment\ICommentRepository;
use App\Http\Requests\Comment\CreateRequest;
use App\Models\Post;

class CommentController extends Controller
{
    protected ICommentRepository $commentRepository;

    public function __construct(ICommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store(CreateRequest $request, Post $post)
    {
        $commentData = $request->validated();

        $this->commentRepository->create($commentData, $post);

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully!');
    }
}
