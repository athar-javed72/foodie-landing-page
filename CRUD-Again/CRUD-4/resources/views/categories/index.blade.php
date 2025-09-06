@extends('master.master')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">All Categories</h2>
    <a href="/categories/create" class="text-blue-600 hover:underline">Add New Category</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 my-3 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Active</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td class="border px-4 py-2">{{ $cat->name }}</td>
                <td class="border px-4 py-2">{{ $cat->description }}</td>
                <td class="border px-4 py-2">{{ $cat->is_active ? 'Yes' : 'No' }}</td>
                <td class="border px-4 py-2">
                    <a href="/categories/{{ $cat->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
                    |
                    <form action="/categories/{{ $cat->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this category?')" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
