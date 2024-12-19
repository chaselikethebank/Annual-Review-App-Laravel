@extends('layouts.app')

@section('content')
    <h1>Add Guide to {{ $jobRole->name }}</h1>

    <form action="{{ route('job-roles.guides.store', $jobRole->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Guide Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Guide Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Guide</button>
    </form>

    <a href="{{ route('job-roles.show', $jobRole->id) }}" class="btn btn-secondary mt-3">Back to Job Role</a>
@endsection
