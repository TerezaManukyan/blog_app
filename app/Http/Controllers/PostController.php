<?php

namespace App\Http\Controllers;

use App\Http\Repository\Post\IPostRepository;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\EditRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected IPostRepository $postRepository;

    public function __construct(IPostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $searchWord = '';

        if ($request->filled('search')) {
            $searchWord = $request->input('search');
        }

        $posts = $this->postRepository->getAll($searchWord);

        return view('post.index')->with([
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('post.edit');
    }

    public function store(CreateRequest $request)
    {
        $postData = $request->validated();

        $this->postRepository->create($postData);

        return redirect()->route('posts.index')->with('success', 'Post is created successfully');
    }

    public function edit(Post $post)
    {
        return view('post.edit')->with([
            'post' => $post
        ]);
    }

    public function update(EditRequest $request)
    {
        $postData = $request->validated();

        $postId = $request->route()->parameter('post');

        $post = $this->postRepository->getPostById($postId);

        $this->postRepository->update($postData, $post);

        return redirect()->route('posts.index')->with('success', 'Post is updated successfully');
    }

    public function destroy(Request $request)
    {
        $postId = $request->route()->parameter('post');

        $post = $this->postRepository->getPostById($postId);

        $this->postRepository->delete($post);

        return redirect()->route('posts.index')->with('success', 'Post is deleted successfully');
    }

    public function show(Request $request)
    {
        $postId = $request->route()->parameter('post');

        $post = $this->postRepository->getPostById($postId);

        return view('post.show')->with([
            'post' => $post,
        ]);
    }
}
