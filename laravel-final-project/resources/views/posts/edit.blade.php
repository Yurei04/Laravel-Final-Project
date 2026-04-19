<x-app-layout>

<div class="max-w-2xl mx-auto p-6">

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 p-6">

        <h1 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Post</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <input type="text" name="title"
                    value="{{ old('title', $post->title) }}"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <textarea name="content"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="5">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <select name="category_id"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">— Select Category —</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3">
                <button class="flex-1 bg-green-600 dark:bg-green-500 hover:bg-green-700 dark:hover:bg-green-600 text-white py-2 rounded-lg text-sm">
                    Update Post
                </button>

                <a href="{{ route('posts.show', $post) }}"
                   class="flex-1 text-center border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 py-2 rounded-lg text-sm hover:bg-gray-100 dark:hover:bg-gray-700">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

</x-app-layout>