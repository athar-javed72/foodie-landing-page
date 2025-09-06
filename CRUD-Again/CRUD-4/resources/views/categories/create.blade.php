@extends('master.master')

@section('title', 'Create Category')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 20px;">Create Category</h2>

    {{-- Validation Errors --}}
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

    {{-- Form --}}
    <form action="{{ url('/categories/store') }}" method="POST">
        @csrf

        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="3" required>{{ old('description') }}</textarea>

        <label>
            <input type="checkbox" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
            Active
        </label>

        <button type="submit">Create</button>
    </form>
</div>
@endsection
