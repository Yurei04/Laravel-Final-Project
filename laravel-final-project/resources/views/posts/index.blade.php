<x-app-layout>

<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Posts</h1>
        <a href="{{ route('posts.create') }}"
           class="bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 text-sm">
            + Create Post
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($posts as $post)

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 p-5">

            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                {{ $post->title }}
            </h2>

            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                {{ Str::limit($post->content, 100) }}
            </p>

            <div class="mt-2 text-xs text-gray-400 dark:text-gray-500">
                Category: {{ $post->category->name ?? 'None' }}
            </div>

            <div class="mt-4 flex justify-between items-center">

                <a href="{{ route('posts.show', $post) }}"
                   class="text-blue-500 dark:text-blue-400 hover:underline text-sm">
                    View
                </a>

                @auth
                <div class="flex gap-3">
                    <a href="{{ route('posts.edit', $post) }}"
                       class="text-yellow-500 dark:text-yellow-400 hover:underline text-sm">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 dark:text-red-400 hover:underline text-sm">
                            Delete
                        </button>
                    </form>
                </div>
                @endauth

            </div>

        </div>

        @empty
        <p class="text-gray-500 dark:text-gray-400 col-span-3">No posts yet.</p>
        @endforelse

    </div>

</div>

</x-app-layout>