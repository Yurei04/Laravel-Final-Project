<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('posts.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            Create Post
        </a>

        <div class="mt-4 space-y-4">
            @foreach($posts as $post)
                <div class="p-4 bg-white shadow rounded">
                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>

                    <div class="mt-2 flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="text-blue-500">Edit</a>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>