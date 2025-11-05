@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Party Details</h1>
        <div class="mb-3">
            <strong>ID:</strong> {{ $party->id }}
        </div>
        <div class="mb-3">
            <strong>Name:</strong> {{ $party->name }}
        </div>
        <div class="mb-3">
            <strong>Phone:</strong> {{ $party->phone ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $party->email ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Address:</strong> {{ $party->address ?? '-' }}
        </div>
        <a href="{{ route('parties.index') }}" class="btn btn-secondary">Back to List</a>
        {{-- <a href="{{ route('parties.edit', $party->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('parties.destroy', $party->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form> --}}
    </div>
@endsection
