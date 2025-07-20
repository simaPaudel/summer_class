@extends('admin.master')

@section('content')

<div class="container my-5">

    <h4>Edit Movie</h4>

    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Movie Poster</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($movie->image)
                <p class="mt-2">Current Image:</p>
                <img src="{{ asset($movie->image) }}" width="120" alt="Movie Poster">
            @endif
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Movie Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $movie->name }}" required>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select class="form-select" id="genre_id" name="genre_id" required>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $movie->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (in minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ $movie->duration }}" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="{{ $movie->release_date }}" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" value="{{ $movie->rating }}" required>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <input type="text" class="form-control" id="language" name="language" value="{{ $movie->language }}" required>
        </div>

        

        <button type="submit" class="btn btn-primary">Update Movie</button>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</div>

@endsection
