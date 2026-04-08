<x-app-layout>
<div class="max-w-2xl mx-auto p-6">

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title"
               value="{{ $post->title }}"
               class="w-full border p-2 mb-2">

        <textarea name="content"
                  class="w-full border p-2 mb-2">{{ $post->content }}</textarea>

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>

</div>
</x-app-layout>