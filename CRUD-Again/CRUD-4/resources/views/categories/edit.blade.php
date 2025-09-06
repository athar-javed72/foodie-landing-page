@extends('master.master')

@section('title', 'Edit Category')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 20px;">Edit Category</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Whoops!</strong> Kuch issues hain:
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/categories/update/'.$category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="3" required>{{ old('description', $category->description) }}</textarea>

        <label>
            <input type="checkbox" name="is_active" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
            Active
        </label>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
