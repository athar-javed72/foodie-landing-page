@extends('include.master')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold mb-6 text-indigo-900">Find Your Dream Property</h1>
        <!-- Filters & Search -->
        <div class="flex flex-col md:flex-row md:items-end md:space-x-6 mb-8">
            <form method="GET" class="flex flex-col md:flex-row md:space-x-4 w-full">
                <input type="text" name="search" placeholder="Search by location or title..." value="{{ request('search') }}" class="mb-2 md:mb-0 px-4 py-2 rounded-md border border-gray-300 w-full md:w-64 focus:ring-2 focus:ring-indigo-400">
                <select name="type" class="mb-2 md:mb-0 px-4 py-2 rounded-md border border-gray-300 w-full md:w-48">
                    <option value="">All Types</option>
                    <option value="House" {{ request('type') == 'House' ? 'selected' : '' }}>House</option>
                    <option value="Villa" {{ request('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                    <option value="Apartment" {{ request('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="Bungalow" {{ request('type') == 'Bungalow' ? 'selected' : '' }}>Bungalow</option>
                </select>
                <select name="price" class="mb-2 md:mb-0 px-4 py-2 rounded-md border border-gray-300 w-full md:w-48">
                    <option value="">Any Price</option>
                    <option value="0-30000000" {{ request('price') == '0-30000000' ? 'selected' : '' }}>Below 3 Crore</option>
                    <option value="30000001-60000000" {{ request('price') == '30000001-60000000' ? 'selected' : '' }}>3-6 Crore</option>
                    <option value="60000001-100000000" {{ request('price') == '60000001-100000000' ? 'selected' : '' }}>6-10 Crore</option>
                    <option value="100000001-1000000000" {{ request('price') == '100000001-1000000000' ? 'selected' : '' }}>10 Crore+</option>
                </select>
                <button type="submit" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800">Filter</button>
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $filtered = collect($properties)
                    ->filter(function($property) {
                        $search = request('search');
                        $type = request('type');
                        $price = request('price');
                        $matches = true;
                        if ($search) {
                            $matches = $matches && (stripos($property['title'], $search) !== false || stripos($property['location'], $search) !== false);
                        }
                        if ($type) {
                            $matches = $matches && (isset($property['type']) && $property['type'] === $type);
                        }
                        if ($price) {
                            [$min, $max] = explode('-', $price);
                            $numericPrice = (int) filter_var($property['price'], FILTER_SANITIZE_NUMBER_INT);
                            $matches = $matches && ($numericPrice >= $min && $numericPrice <= $max);
                        }
                        return $matches;
                    });
            @endphp
            @forelse($filtered as $property)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
                    <div class="relative">
                        <img src="{{ $property['image'] }}" alt="{{ $property['title'] }}" class="w-full h-56 object-cover">
                        @if(isset($property['badge']))
                            <span class="absolute top-3 left-3 bg-yellow-400 text-xs font-bold px-3 py-1 rounded-full shadow">{{ $property['badge'] }}</span>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-2xl font-semibold mb-1 text-indigo-800">{{ $property['title'] }}</h2>
                        <p class="text-gray-600 mb-1">{{ $property['location'] }}</p>
                        <p class="text-indigo-700 font-bold text-lg mb-2">{{ $property['price'] }}</p>
                        @if(isset($property['type']))
                            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded mb-2">{{ $property['type'] }}</span>
                        @endif
                        <div class="mt-auto">
                            <a href="{{ url('/contact') }}" class="block w-full text-center bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold transition">Contact Agent</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12">
                    No properties found matching your criteria.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
