@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Parties</h1>

        <a href="{{ route('parties.create') }}" class="btn btn-primary mb-3">New Party</a>

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
                @forelse ($parties as $party)
                    <tr>
                        <td>{{ $party->id }}</td>
                        <td>{{ $party->name }}</td>
                        <td>{{ $party->phone ?? '-' }}</td>
                        <td>{{ $party->email ?? '-' }}</td>
                        <td>{{ $party->address ?? '-' }}</td>
                        <td>
                            <a href="{{ route('parties.show', $party->id) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('parties.edit', $party->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('parties.destroy', $party->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No parties found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $parties->links() }}
    </div>
@endsection
