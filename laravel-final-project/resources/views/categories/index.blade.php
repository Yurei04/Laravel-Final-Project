<h1 class="text-2xl font-bold">Categories</h1>

@if(session('success'))
    <p class="text-green-500">{{ session('success') }}</p>
@endif

<a href="{{ route('categories.create') }}">Create Category</a>

@foreach($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        <p>{{ $category->description }}</p>

        <a href="{{ route('categories.edit', $category) }}">Edit</a>

        <form method="POST" action="{{ route('categories.destroy', $category) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach