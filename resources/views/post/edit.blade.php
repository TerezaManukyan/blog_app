<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10 p-8 bg-white shadow-md rounded-lg">
    @if(isset($post))
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
    @else
        <h1 class="text-2xl font-bold mb-4">Create Post</h1>
    @endif

    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}">
        @csrf
        @isset($post)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" value="{{ $post->title ?? old('title') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
            <textarea name="content" id="content"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $post->content ?? old('content') }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ isset($post) ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>

</body>
</html>
