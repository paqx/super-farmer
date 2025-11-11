@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact Details</h1>
        <div class="mb-3">
            <strong>ID:</strong> {{ $contact->id }}
        </div>
        <div class="mb-3">
            <strong>Name:</strong> {{ $contact->name }}
        </div>
        <div class="mb-3">
            <strong>Phone:</strong> {{ $contact->phone ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $contact->email ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Address:</strong> {{ $contact->address ?? '-' }}
        </div>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to List</a>
        {{-- <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form> --}}
    </div>
@endsection
