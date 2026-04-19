<x-app-layout>



<div class="max-w-4xl mx-auto py-10 px-4">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-200">Categories</h1>
            <p class="text-sm text-gray-400 mt-1">Manage your categories below.</p>
        </div>
        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition">
            + New Category
        </a>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="mb-5 flex items-center gap-2 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white dark:bg-gray-800  dark:shadow-gray-700 rounded-xl shadow-sm overflow-hidden">
        @forelse($categories as $category)
            <div class="flex items-center justify-between px-5 py-4 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-white-800 truncate">{{ $category->name }}</p>
                    @if($category->description)
                        <p class="text-xs text-gray-200 mt-0.5 truncate">{{ $category->description }}</p>
                    @endif
                </div>

                <div class="flex items-center gap-2 ml-4 shrink-0">
                    <a href="{{ route('categories.edit', $category) }}"
                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('categories.destroy', $category) }}"
                          onsubmit="return confirm('Delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="px-5 py-12 text-center text-sm text-gray-400">
                No categories yet. <a href="{{ route('categories.create') }}" class="text-indigo-600 hover:underline">Create one</a>.
            </div>
        @endforelse
    </div>

</div>

</x-app-layout>