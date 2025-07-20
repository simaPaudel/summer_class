@extends('admin.master')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Movies Information</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.movies.create') }}" class="btn btn-success">+ Add New Movie</a>
    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.movies.index') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or description">
        
         
            <select name="genre_id" class="form-select">
                <option value="">-- Select Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
       
            <button type="submit" class="btn btn-primary w-100">Search</button>

             @if(request()->has('search') || request()->has('genre_id'))
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Back</a>
             @endif
        </div>
    </form>

    <!-- Movies Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Rating</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->genre->name ?? 'N/A' }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->duration }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->rating }}</td>

                    <td>
                        @if($movie->image)
                            <img src="{{ asset($movie->image) }}" width="80" alt="Movie Poster">
                        @else
                            N/A
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this movie?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
