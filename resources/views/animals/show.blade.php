@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Animal Details</h1>

        <div class="mb-3"><strong>ID:</strong> {{ $animal->id }}</div>
        <div class="mb-3"><strong>Type:</strong> {{ $animal->animalType->type ?? '-' }}</div>
        <div class="mb-3"><strong>Tag:</strong> {{ $animal->tag ?? '-' }}</div>
        <div class="mb-3"><strong>Name:</strong> {{ $animal->name ?? '-' }}</div>
        <div class="mb-3"><strong>Sex:</strong> {{ ucfirst($animal->sex) }}</div>

        <div class="mb-3"><strong>Date of Birth:</strong>
            {{ $animal->date_of_birth ? $animal->date_of_birth->format('Y-m-d') : '-' }}</div>
        <div class="mb-3"><strong>Date of Death:</strong>
            {{ $animal->date_of_death ? $animal->date_of_death->format('Y-m-d') : '-' }}</div>

        <div class="mb-3"><strong>Number of Siblings at Birth:</strong>
            {{ $animal->num_of_siblings_at_birth !== null ? $animal->num_of_siblings_at_birth : '-' }}
        </div>

        <div class="mb-3"><strong>Birth Weight:</strong>
            {{ $animal->birth_weight !== null ? $animal->birth_weight : '-' }}
        </div>

        <div class="mb-3"><strong>Color Pattern:</strong>
            {{ $animal->color_pattern ?? '-' }}
        </div>

        @if ($animal->photo)
            <div class="mb-3">
                <strong>Photo:</strong><br>
                <img src="{{ asset('storage/' . $animal->photo) }}" alt="Animal Photo" style="max-width: 200px;">
            </div>
        @endif

        <div class="mb-3"><strong>Mother:</strong>
            @if ($animal->maternal)
                <a href="{{ route('animals.show', $animal->maternal->id) }}">
                    {{ $animal->maternal->name ?? 'Animal #' . $animal->maternal->id }}
                </a>
            @else
                -
            @endif
        </div>
        <div class="mb-3"><strong>Father:</strong>
            @if ($animal->paternal)
                <a href="{{ route('animals.show', $animal->paternal->id) }}">
                    {{ $animal->paternal->name ?? 'Animal #' . $animal->paternal->id }}
                </a>
            @else
                -
            @endif
        </div>
        <div class="mb-3"><strong>Breeder:</strong>
            @if ($animal->breeder)
                <a href="{{ route('parties.show', $animal->breeder->id) }}">{{ $animal->breeder->name }}</a>
            @else
                -
            @endif
        </div>
        <div class="mb-3"><strong>Owner:</strong>
            @if ($animal->owner)
                <a href="{{ route('parties.show', $animal->owner->id) }}">{{ $animal->owner->name }}</a>
            @else
                -
            @endif
        </div>

        <div class="mb-3">
            <strong>Breed Composition:</strong>
            @if ($animal->breed_composition)
                <pre>{{ json_encode($animal->breed_composition, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            @else
                -
            @endif
        </div>

        <div class="mb-3">
            <strong>Attributes:</strong>
            @if ($animal->attributes)
                <pre>{{ json_decode($animal->attributes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            @else
                -
            @endif

        </div>

        <a href="{{ route('animals.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
