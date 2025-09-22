@extends('layouts.app')

@section('content')
<h2 class="text-center text-2xl font-semibold mb-6">My Favorite Books</h2>

<div class="grid md:grid-cols-3 gap-6">
    @foreach($books as $book)
    <div class="bg-white rounded shadow p-6">
        <h3 class="font-semibold">{{ $book->title }}</h3>
        <p class="text-xs text-gray-500">by {{ $book->author }}</p>

        <div class="my-4 flex justify-center">
            @if($book->cover)
                <img src="{{ asset('storage/'.$book->cover) }}" class="h-40" alt="cover">
            @else
                <div class="h-40 w-32 bg-gray-200 flex items-center justify-center">200x300</div>
            @endif
        </div>

        <p class="text-sm text-gray-600">{{ $book->publisher }} • {{ $book->year }}</p>

        <div class="mt-4 flex gap-2">
            <a href="{{ route('books.show', $book) }}" class="px-3 py-2 rounded bg-slate-800 text-white">View Details</a>
            <form action="{{ route('books.favorite', $book) }}" method="POST">
                @csrf
                <button type="submit" class="px-3 py-2 border rounded">Unfavorite</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $books->links() }}
</div>
@endsection
