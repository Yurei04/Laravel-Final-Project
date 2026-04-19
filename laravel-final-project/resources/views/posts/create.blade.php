<x-app-layout>

<div class="max-w-2xl mx-auto p-6">

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow dark:shadow-gray-700 p-6">

        <h1 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Create Post</h1>

        <form method="POST" action="{{ route('posts.store') }}" class="space-y-4">
            @csrf

            <div>
                <input name="title"
                    value="{{ old('title') }}"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Title">
                @error('title')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <textarea name="content"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="5"
                    placeholder="Content">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <select name="category_id"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">— Select Category —</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <select name="tags[]" multiple
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Hold Ctrl/Cmd to select multiple.</p>
            </div>

            <button class="w-full bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 text-white py-2 rounded-lg text-sm">
                Create Post
            </button>

        </form>

    </div>

</div>

</x-app-layout>