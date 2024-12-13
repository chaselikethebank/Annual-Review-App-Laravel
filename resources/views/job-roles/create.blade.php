@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Job Role</h1>

        <form action="{{ route('job-roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Job Role Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Enter job role name">
            </div>

            <button type="submit" class="btn btn-success mt-3">Create Job Role</button>
        </form>

        <a href="{{ route('job-roles.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </div>
@endsection