@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Guide for Job Role: {{ $jobRole->name }}</h1>

        <form action="{{ route('job-roles.guides.store', $jobRole) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Guide Title</label>
                <input type="text" name="title" id="title" class="form-control" required placeholder="Enter guide title">
            </div>
        
            <div class="form-group mt-3">
                <label for="content">Guide Content</label>
                <textarea name="content" id="content" rows="6" class="form-control" required placeholder="Enter the content of the guide"></textarea>
            </div>
        
            <button type="submit" class="btn btn-primary mt-3">Create Guide</button>
        </form>
        

        <a href="{{ route('job-roles.show', $jobRole) }}" class="btn btn-secondary mt-3">Back to This Job</a></br>
        <a href="{{ route('job-roles.index', $jobRole) }}" class="btn btn-secondary mt-3">Back to All Jobs</a>

    </div>
@endsection
