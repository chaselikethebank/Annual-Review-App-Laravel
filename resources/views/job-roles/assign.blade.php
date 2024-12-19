{{-- resources/views/job-roles/assign.blade.php --}}

@extends('layouts.app')


@section('content')
<h1>Assign Job Role Page</h1>

<form method="POST" action="{{ route('job-roles.store.assign') }}">
    @csrf
    <label for="job_role_id">Select a Job Role:</label>
    {{-- <select id="job_role_id" name="job_role_id">
        @foreach user I want to be able to assign them as managers and then if manager assign their subordinates

        @endforeach
    </select> --}}

    <button type="submit">Assign</button>
</form>
<a href="{{ route('job-roles.index') }}" class="btn btn-secondary mt-3">Cancel</a>
@endsection
