@extends('admin.master')

@section('content')
<div class="container my-5">
    <h4>Create User</h4>

    <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autocomplete="off" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="off" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
