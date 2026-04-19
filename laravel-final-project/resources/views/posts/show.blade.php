<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 p-6">

        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            {{ $post->title }}
        </h1>

        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Category: {{ $post->category->name ?? 'None' }}
        </p>

        <div class="mt-2 flex flex-wrap gap-2">
            @foreach($post->tags as $tag)
                <span class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 text-xs rounded">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>

        <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
            {{ $post->content }}
        </p>

    </div>

    <hr class="my-6 border-gray-200 dark:border-gray-700">

    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
        Comments
    </h2>

    @forelse($post->comments as $comment)
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4 mt-2">
            <p class="text-gray-800 dark:text-gray-200">{{ $comment->content }}</p>
            <small class="text-gray-500 dark:text-gray-400">By: {{ $comment->user->name }}</small>

            @auth
                @if(auth()->id() === $comment->user_id)
                <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 dark:text-red-400 text-xs hover:underline">
                        Delete
                    </button>
                </form>
                @endif
            @endauth
        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400 text-sm">No comments yet.</p>
    @endforelse

    @auth
    <form method="POST" action="{{ route('comments.store', $post) }}" class="mt-6">
        @csrf
        <textarea name="content"
            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            rows="3"
            placeholder="Write a comment..."></textarea>
        <button class="mt-2 bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
            Add Comment
        </button>
    </form>
    @else
    <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
        <a href="{{ route('login') }}" class="text-blue-500 dark:text-blue-400 hover:underline">Log in</a> to leave a comment.
    </p>
    @endauth

</div>

</x-app-layout>