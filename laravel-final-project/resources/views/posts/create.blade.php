<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        @if(auth()->check())
        <form method="POST" action="{{ route('comments.store', $post) }}">
            @csrf

            <textarea name="content" class="border p-2 w-full" placeholder="Write a comment..."></textarea>

            <button class="bg-blue-500 text-white px-3 py-1 mt-2">
                Post Comment
            </button>
        </form>
        @endif

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

    <h2 class="text-xl mt-6">Comments</h2>

    @foreach($post->comments as $comment)
        <div class="border p-2 mt-2">
            <p>{{ $comment->content }}</p>
            <small>By: {{ $comment->user->name }}</small>

            @if(auth()->id() === $comment->user_id)
            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500">Delete</button>
            </form>
            @endif
        </div>
    @endforeach

    <label>Tags</label>

    <select name="tags[]" multiple class="border p-2 w-full">
        @foreach(\App\Models\Tag::all() as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
        
</x-app-layout>