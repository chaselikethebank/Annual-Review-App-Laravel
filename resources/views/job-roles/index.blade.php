@extends('layouts.app')

@section('content')
    <h1>Job Roles</h1>
    <a href="{{ route('job-roles.create') }}" class="btn btn-primary">Create Job Role</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobRoles as $jobRole)
                <tr>
                    <td>{{ $jobRole->name }}</td>
                    <td>
                        <a href="{{ route('job-roles.edit', $jobRole) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('job-roles.destroy', $jobRole) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
