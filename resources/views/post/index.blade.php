<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10 p-8 bg-white shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        @if(Auth::check())
            <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700 mr-4">Logout</a>
        @endif
        <h1 class="text-2xl font-bold">Posts</h1>
        <div class="flex">
            @if($posts->isNotEmpty())
                <form action="{{ route('posts.index') }}" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Search posts..." class="py-2 px-4 rounded-l-lg">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r-lg">Search
                    </button>
                </form>
            @endif
            <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-700 ml-4">
                Create a new post
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    @if($posts->isNotEmpty())
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Author</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Title</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Content</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-4">{{ $post->user->name }}</td>
                    <td class="py-2 px-4">{{ $post->title }}</td>
                    <td class="py-2 px-4">{{ $post->content }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('posts.show', $post->id) }}"
                           class="text-green-500 hover:text-green-700 mr-2">Show</a>
                        @if(Auth::user()->id == $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <button onclick="openDeleteDialog({{ $post->id }})"
                                    class="text-red-500 hover:text-red-700">Delete
                            </button>
                        @else
                            <span class="text-gray-400 cursor-not-allowed">Edit</span>
                            <span class="text-gray-400 cursor-not-allowed">Delete</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-lg font-bold mb-4">Are you sure you want to delete this post?</p>
        <div class="flex justify-end">
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">Delete
                </button>
                <button type="button" onclick="closeDeleteDialog()"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">Cancel
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteDialog(postId) {
        var modal = document.getElementById('deleteModal');
        var form = document.getElementById('deleteForm');
        form.action = '/posts/' + postId;
        modal.classList.remove('hidden');
    }

    function closeDeleteDialog() {
        var modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }
</script>

</body>
</html>
