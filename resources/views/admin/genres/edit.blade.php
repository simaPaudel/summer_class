@extends('admin.master')

@section('content')

<div class="container my-5">
    <h4>Edit Genre</h4>

    <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Genre Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $genre->description }}</textarea>
        </div>

        <button type="submit" class="btn">Update</button>
        <a href="{{ route('admin.genres.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
