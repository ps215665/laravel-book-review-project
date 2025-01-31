@extends('layout.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Add Review for {{ $book->title }}</h1>

        <form method="POST" action="{{ route('books.reviews.store', $book) }}" class="space-y-4">
            @csrf

            <div>
                <label for="review" class="block text-gray-700 font-semibold mb-1">Review</label>
                <textarea name="review" id="review" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                @error('review')
                    <span class="text-red-500 mt-2 mb-2">{{$message}}</span>
                @enderror
            </div>

            <div>
                <label for="rating" class="block text-gray-700 font-semibold mb-1">Rating</label>
                <select name="rating" id="rating" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="">Select a Rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">Add Review</button>
        </form>
    </div>
@endsection
