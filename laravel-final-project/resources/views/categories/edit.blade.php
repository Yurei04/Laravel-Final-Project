<h1>Edit Category</h1>

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $category->name }}" class="border p-2">

    <textarea name="description" class="border p-2">{{ $category->description }}</textarea>

    <button type="submit">Update</button>
</form>