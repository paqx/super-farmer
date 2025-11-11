@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contacts</h1>

        <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">New Contact</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone ?? '-' }}</td>
                        <td>{{ $contact->email ?? '-' }}</td>
                        <td>{{ $contact->address ?? '-' }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No contacts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $contacts->links() }}
    </div>
@endsection
