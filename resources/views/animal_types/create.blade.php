@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Animal Type</h1>
        <form action="{{ route('animal-types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('animal-types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
