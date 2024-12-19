@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Role Name: {{ $jobRole->name }}</h1>
    <h2>Guides:</h2><br/>

    @if($jobRole->guides->isEmpty())
    <p>No guides available for this job role.</p>
    @else
    <ul class="list-group">
        @foreach($jobRole->guides as $guide)
        <li class="list-group-item">
            <h4>Guide Name: {{ $guide->title }}</h4>
            <p>Description: {{ $guide->content }}</p>
            <p>Created at: {{ $guide->created_at->format('M d, Y') }}</p>
            <p>Updated at: {{ $guide->updated_at->format('M d, Y') }}</p>
            {{-- add a p tag displaying the  --}}


            <a href="{{ route('job-roles.guides.edit', [$jobRole, $guide]) }}" class="btn btn-warning">Edit</a>
            <br/>
            <br/>
        </li>
        @endforeach
    </ul>
    @endif
    <br/>

    <a href="{{ route('job-roles.guides.create', $jobRole->id) }}" class="btn btn-primary">+ Guide</a><br />
    <a href="{{ route('job-roles.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
