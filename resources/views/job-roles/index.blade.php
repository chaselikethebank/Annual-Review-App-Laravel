@extends('layouts.app')

@section('header')
     <!-- Custom large header -->
@endsection

@section('content')
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

                {{-- Show Role --}}
                <a href="{{ route('job-roles.show', $jobRole) }}" class="btn btn-warning">Show</a>

                <!-- Edit Job Role -->
                <a href="{{ route('job-roles.edit', $jobRole) }}" class="btn btn-warning">Edit</a>

                <!-- Delete Job Role -->
                <form action="{{ route('job-roles.destroy', $jobRole) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this job role?');">
                        Delete
                    </button>
                </form>
                

                <!-- Link to Create Guide for this Job Role -->
                <a href="{{ route('job-roles.guides.create', $jobRole->id) }}" class="btn btn-success ml-2">+ Guide</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('job-roles.create') }}" class="btn btn-primary">Create Job Role</a>

@endsection