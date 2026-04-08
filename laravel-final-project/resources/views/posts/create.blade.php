<x-app-layout>
<div class="max-w-2xl mx-auto p-6">

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <input type="text" name="title" placeholder="Title"
            class="w-full border p-2 mb-3">

        <textarea name="content" placeholder="Content"
            class="w-full border p-2 mb-3"></textarea>

        <select name="category_id" class="w-full border p-2 mb-3">
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Save
        </button>
    </form>

</div>
</x-app-layout>