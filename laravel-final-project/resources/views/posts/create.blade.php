<x-app-layout>

<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow">

<h1 class="text-xl font-bold mb-4">Create Post</h1>

<form method="POST" action="{{ route('posts.store') }}" class="space-y-4">
    @csrf

    <input name="title" class="w-full border p-2 rounded" placeholder="Title">

    <textarea name="content" class="w-full border p-2 rounded" placeholder="Content"></textarea>

    <select name="category_id" class="w-full border p-2 rounded">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <select name="tags[]" multiple class="w-full border p-2 rounded">
        @foreach(\App\Models\Tag::all() as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>

    <button class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
        Create Post
    </button>

</form>

</div>

</x-app-layout>