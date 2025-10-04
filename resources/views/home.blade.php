@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">
    Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }}
  </h1>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">Total Books</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalBooks }}</p>
    </div>
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">Genre</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalGenres }}</p>
    </div>
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">Users</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
    </div>
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">Current Favorites</h2>
      <p class="text-3xl font-bold mt-2">{{ Auth::check() ? $totalFavorites : 0 }}</p>
    </div>
  </div>

  <div class="bg-white border rounded p-6 shadow mt-8">
    <h3 class="text-lg font-bold mb-3">Test</h3>
    <ul class="list-decimal list-inside text-gray-700 space-y-1">
      <li>Test.</li>
      <li>Test.</li>
      <li>Test.</li>
      <li>Test.</li>
      <li>Test.</li>
    </ul>
  </div>
@endsection
