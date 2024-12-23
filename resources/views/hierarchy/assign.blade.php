{{-- resources/views/assign.blade.php --}}

@extends('layouts.app')


@section('content')
<h1>Assign Hierarchy</h1>

<form method="POST" action="{{ route('hierarchy.store') }}">
    @csrf
    <label for="user_id">Select a User:</label>
    <select id="user_id" name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <label for="manager_id">Assign Manager:</label>
    <select id="manager_id" name="manager_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
<br/>
    <button type="submit">Submit and Assign</button>
</form>
<a href="{{ route('hierarchy.index') }}" class="btn btn-secondary mt-3">Cancel</a>
@endsection
