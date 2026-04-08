<x-app-layout>

<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Posts</h1>

        <a href="{{ route('posts.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Create Post
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($posts as $post)

        <div class="bg-white rounded-xl shadow p-5">

            <h2 class="text-lg font-semibold">{{ $post->title }}</h2>

            <p class="text-sm text-gray-500 mt-1">
                {{ Str::limit($post->content, 100) }}
            </p>

            <div class="mt-2 text-xs text-gray-400">
                Category: {{ $post->category->name ?? 'None' }}
            </div>

            <div class="mt-4 flex justify-between">

                <a href="{{ route('posts.show', $post) }}"
                   class="text-blue-500 hover:underline">
                    View
                </a>

                <div class="flex gap-2">

                    <a href="{{ route('posts.edit', $post) }}"
                       class="text-yellow-500 hover:underline">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-500 hover:underline">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>