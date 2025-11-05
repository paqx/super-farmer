@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Animal Type Details</h1>
        <div class="mb-3">
            <strong>ID:</strong> {{ $animalType->id }}
        </div>
        <div class="mb-3">
            <strong>Type:</strong> {{ $animalType->type }}
        </div>
        <a href="{{ route('animal-types.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
