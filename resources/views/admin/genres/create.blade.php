@extends('admin.master')

@section('content')

<div class="container my-5">
    <h4>Create Genre</h4>

    <form action="{{ route('admin.genres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Genre Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn">Save</button>
        <a href="{{ route('admin.genres.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
