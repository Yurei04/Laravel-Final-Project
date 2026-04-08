<h1 class="text-2xl font-bold">{{ $post->title }}</h1>

<p class="mt-2">{{ $post->content }}</p>

<p class="text-sm text-gray-500">
    Category: {{ $post->category->name ?? 'None' }}
</p>

<div class="mt-2">
    @foreach($post->tags as $tag)
        <span class="bg-gray-200 px-2 py-1 text-sm">
            {{ $tag->name }}
        </span>
    @endforeach
</div>

<hr class="my-4">

<h2 class="text-xl">Comments</h2>

@foreach($post->comments as $comment)
    <div class="border p-2 mt-2">
        <p>{{ $comment->content }}</p>
        <small>By: {{ $comment->user->name }}</small>
    </div>
@endforeach

@if(auth()->check())
<form method="POST" action="{{ route('comments.store', $post) }}">
    @csrf
    <textarea name="content" class="border w-full p-2"></textarea>
    <button class="bg-blue-500 text-white px-3 py-1 mt-2">
        Add Comment
    </button>
</form>
@endif