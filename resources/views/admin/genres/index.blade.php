@extends('admin.master')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Genres List</h2>
        <a href="{{ route('admin.genres.create') }}" class="btn btn-success">+ Create Genre</a>
    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.genres.index') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or description">
        
            <button type="submit" class="btn btn-primary w-100">Search</button>
        
        @if(request('search'))
            <a href="{{ route('admin.genres.index') }}" class="btn btn-dark w-100">Back</a>
        @endif
        </div>
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($genres as $genre)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>{{ $genre->description }}</td>
                    <td>
                        <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this genre?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No genres found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
