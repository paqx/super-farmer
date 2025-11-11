@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Animal Types</h1>

        <a href="{{ route('animal-types.create') }}" class="btn btn-primary mb-3">New Animal Type</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($animalTypes as $animalType)
                    <tr>
                        <td>{{ $animalType->id }}</td>
                        <td>{{ $animalType->type }}</td>
                        <td>
                            @include('partials.crud_buttons', [
                                'resourceName' => 'animal-types',
                                'model' => $animalType,
                            ])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No animal types found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $animalTypes->links() }}
    </div>
@endsection
