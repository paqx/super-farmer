@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Animal</h1>
        <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tag" class="form-label">Tag</label>
                <input type="text" class="form-control" name="tag" id="tag" maxlength="64"
                    value="{{ old('tag') }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" maxlength="100"
                    value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <select name="sex" id="sex" class="form-select" required>
                    <option value="">Select Sex</option>
                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="animal_type_id" class="form-label">Type</label>
                <select name="animal_type_id" id="animal_type_id" class="form-select" required>
                    <option value="">Select Type</option>
                    @foreach ($animalTypes as $type)
                        <option value="{{ $type->id }}" {{ old('animal_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="breed_composition" class="form-label">Breed Composition (JSON)</label>
                <textarea class="form-control" name="breed_composition" id="breed_composition">{{ old('breed_composition') }}</textarea>
                <small class="form-text text-muted">Example: {"Alpine": 100}</small>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                    value="{{ old('date_of_birth') }}">
            </div>
            <div class="mb-3">
                <label for="date_of_death" class="form-label">Date of Death</label>
                <input type="date" class="form-control" name="date_of_death" id="date_of_death"
                    value="{{ old('date_of_death') }}">
            </div>
            <div class="mb-3">
                <label for="num_of_siblings_at_birth" class="form-label">Number of Siblings at Birth</label>
                <input type="number" class="form-control" name="num_of_siblings_at_birth" id="num_of_siblings_at_birth"
                    value="{{ old('num_of_siblings_at_birth') }}" min="0">
            </div>
            <div class="mb-3">
                <label for="birth_weight" class="form-label">Birth Weight</label>
                <input type="number" step="any" class="form-control" name="birth_weight" id="birth_weight"
                    value="{{ old('birth_weight') }}">
            </div>
            <div class="mb-3">
                <label for="color_pattern" class="form-label">Color Pattern</label>
                <input type="text" class="form-control" name="color_pattern" id="color_pattern"
                    value="{{ old('color_pattern') }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="maternal_id" class="form-label">Mother</label>
                <select name="maternal_id" id="maternal_id" class="form-select">
                    <option value="">-- None --</option>
                    @foreach ($animals as $candidate)
                        <option value="{{ $candidate->id }}"
                            {{ old('maternal_id') == $candidate->id ? 'selected' : '' }}>
                            {{ $candidate->name ?? 'Animal #' . $candidate->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="paternal_id" class="form-label">Father</label>
                <select name="paternal_id" id="paternal_id" class="form-select">
                    <option value="">-- None --</option>
                    @foreach ($animals as $candidate)
                        <option value="{{ $candidate->id }}"
                            {{ old('paternal_id') == $candidate->id ? 'selected' : '' }}>
                            {{ $candidate->name ?? 'Animal #' . $candidate->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="breeder_id" class="form-label">Breeder</label>
                <select name="breeder_id" id="breeder_id" class="form-select">
                    <option value="">-- None --</option>
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}" {{ old('breeder_id') == $contact->id ? 'selected' : '' }}>
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="owner_id" class="form-label">Owner</label>
                <select name="owner_id" id="owner_id" class="form-select">
                    <option value="">-- None --</option>
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}" {{ old('owner_id') == $contact->id ? 'selected' : '' }}>
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="attributes" class="form-label">Attributes (JSON)</label>
                <textarea class="form-control" name="attributes" id="attributes">{{ old('attributes') }}</textarea>
                <small class="form-text text-muted">Example: {"milk_yield": 10.2, "color_pattern": "spotted"}</small>
            </div>
            <button type="submit" class="btn btn-primary">Create Animal</button>
            <a href="{{ route('animals.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
