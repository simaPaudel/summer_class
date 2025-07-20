@extends('admin.master')

@section('content')
<div class="container my-5">
    <h2>Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>New Password (leave blank to keep current)</label><br>
            <input type="password" name="password">
            @error('password')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Confirm New Password</label><br>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('admin.users.index') }}">Cancel</a>
    </form>
</div>
@endsection
