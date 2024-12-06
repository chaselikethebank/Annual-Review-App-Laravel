@extends('layouts.app')

@section('content')
    <h1>Edit Job Role</h1>

    <form action="{{ route('job-roles.update', $jobRole) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Job Role Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $jobRole->name }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Job Role</button>
    </form>
@endsection
