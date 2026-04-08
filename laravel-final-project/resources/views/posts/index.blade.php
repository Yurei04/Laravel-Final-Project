<x-app-layout>
<div class="max-w-4xl mx-auto p-6">

    <a href="{{ route('posts.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">
        Create Post
    </a>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mt-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 space-y-4">
        @foreach($posts as $post)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl font-bold">{{ $post->title }}</h2>

                <p class="text-sm text-gray-500">
                    Category: {{ $post->category->name ?? 'None' }}
                </p>

                <p class="mt-2">{{ $post->content }}</p>

                <div class="mt-3 flex gap-3">
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>
</x-app-layout>