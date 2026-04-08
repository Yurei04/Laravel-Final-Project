<x-app-layout>
<div class="max-w-2xl mx-auto p-6">

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <input type="text" name="title" placeholder="Title"
               class="w-full border p-2 mb-2">

        <textarea name="content" placeholder="Content"
                  class="w-full border p-2 mb-2"></textarea>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Save
        </button>
    </form>

</div>
</x-app-layout>