@extends('layout.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Book List</h1>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('books.index') }}" class="mb-4 flex space-x-2">
        <input type="text" name="title" placeholder="Search by title..." class="w-full p-2 border rounded-lg shadow-sm" value="{{ request('title') }}">
        <input type="hidden" name="filter" value="{{ request('filter') }}" />
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">Search</button>
        <a href="{{ route('books.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600">Clear</a>
    </form>
    <div class="filter-container mb-4 flex bg-blue-100">
        @php
            $filters = [
                '' => 'Latest',
                'popular_last_month' => 'Popular Last Month',
                'popular_last_6months' => 'Popular Last 6 Months',
                'highest_rated_last_month' => 'Highest Rated Last Month',
                'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
            ];
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}"
               class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }} p-4 hover:bg-blue-500 hover:text-white ">
                {{ $label }}
            </a>
        @endforeach
    </div>
    <div class="space-y-4">
        @forelse($books as $book)
            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center">
                <div>
                    <a href="{{ route('books.show', $book) }}"><h2 class="text-xl font-semibold text-blue-500">{{$book->title}}</h2></a>
                    <p class="text-gray-700">Author: {{$book->author}}</p>
                </div>
                <div class="text-right">
                    <span class="text-gray-900 font-semibold">Rating: 4.0</span>
                    <p class="text-gray-600">Based on {{$book->reviews->count()}} reviews</p>
                </div>
            </div>
            @empty
            <span>No Book's Found.</span>
        @endforelse
        @if ($books)
            {{$books->links()}}
        @endif
    </div>
@endsection
