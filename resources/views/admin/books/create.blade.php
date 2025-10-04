@extends('layouts.app')

@section('content')
  <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Add Book</h1>

    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul>
          @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf

      <div>
        <label class="block font-semibold">Title</label>
        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold">Author</label>
        <input type="text" name="author" class="w-full border rounded px-3 py-2" required>
      </div>

      <div>
        <label class="block font-semibold">Publisher</label>
        <input type="text" name="publisher" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">Year</label>
        <input type="number" name="year" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">Genre</label>
        <input type="text" name="genre" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
      </div>

      <div>
        <label class="block font-semibold">Cover</label>
        <input type="file" name="cover" class="w-full border rounded px-3 py-2">
      </div>

      <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-slate-800 text-white rounded">Submit</button>
      </div>
    </form>
  </div>
@endsection
