@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h1>

  <!-- Dashboard Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">Total Books</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalBooks }}</p>
    </div>
    <div class="bg-white border rounded p-6 shadow text-center">
      <h2 class="text-lg font-semibold">Categories</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalCategories }}</p>
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

  <!-- Info Section -->
  <div class="bg-white border rounded p-6 shadow mt-8">
    <h3 class="text-lg font-bold mb-3">Borrowing Rules</h3>
    <ul class="list-decimal list-inside text-gray-700 space-y-1">
      <li>Maximum borrowing time is 1 week.</li>
      <li>Each member can borrow up to 3 books.</li>
      <li>Late returns will be fined Rp. 15,000/week per book.</li>
      <li>Please confirm with staff when borrowing books.</li>
      <li>Fines must be paid immediately when returning books.</li>
    </ul>
  </div>
@endsection
