<!DOCTYPE html>
<html>
<head>
    <title>Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10 p-8 bg-white shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700">
            {{ __('Posts') }}
        </a>
    </div>
    <p class="mb-4">{{ $post->content }}</p>

    @if($post->comments->isNotEmpty())
    <h2 class="text-xl font-bold mb-4">Comments</h2>

    @foreach ($post->comments as $comment)
        <div class="mb-4 p-4 bg-gray-200 rounded-lg">
            <p>{{ $comment->content }}</p>
            <small>By {{ $comment->user->name }} at {{ $comment->created_at }}</small>
        </div>
    @endforeach
    @endif

    @auth
        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Add a comment:</label>
                <textarea name="content" id="content" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add</button>
            </div>
        </form>
    @endauth
</div>

</body>
</html>
