<h1>Create Category</h1>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <input name="name" placeholder="Name" class="border p-2">

    <textarea name="description" placeholder="Description" class="border p-2"></textarea>

    <button type="submit">Save</button>
</form>