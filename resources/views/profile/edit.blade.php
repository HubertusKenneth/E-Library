@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container py-4">

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">Profile updated.</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">Profile Information</div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control"
                           value="{{ old('name', auth()->user()->name) }}" required>
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control"
                           value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    
</div>
@endsection
