<x-app-layout>
<div class="max-w-2xl mx-auto p-6">

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title"
            value="{{ $post->title }}"
            class="w-full border p-2 mb-3">

        <textarea name="content"
            class="w-full border p-2 mb-3">{{ $post->content }}</textarea>

        <select name="category_id" class="w-full border p-2 mb-3">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ $post->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>

</div>
</x-app-layout>