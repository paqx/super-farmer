@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Animals</h1>

        <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">New Animal</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Tag</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Date of Birth</th>
                    <th>Breeder</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($animals as $animal)
                    <tr>
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->animalType->type ?? '-' }}</td>
                        <td>{{ $animal->tag }}</td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ ucfirst($animal->sex) }}</td>
                        <td>{{ $animal->date_of_birth ? $animal->date_of_birth->format('Y-m-d') : '-' }}</td>
                        <td>{{ $animal->breeder ? $animal->breeder->name : '-' }}</td>
                        <td>{{ $animal->owner ? $animal->owner->name : '-' }}</td>
                        <td>
                            @include('partials.crud_buttons', [
                                'resourceName' => 'animals',
                                'model' => $animal,
                            ])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No animals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $animals->links() }}
    </div>
@endsection
