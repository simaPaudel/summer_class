@extends('admin.master')

@section('content')
<div class="container my-5">
    <h4>Users</h4>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">+ Create User</a>

    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.users.index') }}" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or email">
       
            <button class="btn btn-primary w-100" type="submit">Search</button>

            
        @if(request()->has('search'))
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
        @endif
        </div>
    </form>

    <!-- User Table -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                           <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?')">
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
                    <td colspan="5">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
