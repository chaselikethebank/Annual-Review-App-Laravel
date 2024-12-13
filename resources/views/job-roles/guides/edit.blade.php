@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Guide for Job Role: {{ $jobRole->name }}</h1>

    <h2>Guide: {{ $guide->title }}</h2>

    <form method="POST" action="{{ route('job-roles.guides.update', [$jobRole->id, $guide->id]) }}">
        @csrf
        @method('PUT')

        <!-- Input fields for the guide -->
        <div class="form-group">
            <label for="title">Guide Title</label>
            <input type="text" name="title" value="{{ $guide->title }}" class="form-control" id="title" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5" required>{{ $guide->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Guide</button>
    </form>
</div>
@endsection
