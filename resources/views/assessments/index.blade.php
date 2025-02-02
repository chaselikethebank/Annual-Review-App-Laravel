<x-app-layout>

@section('content')
 

<div class="container">
    <h1 class="mb-4">Assessments</h1>
    
    @if($assessments->isEmpty())
        <div class="alert alert-info">
            No assessments available.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Reviewer</th>
                    <th>Reviewee</th>
                    <th>Job Role</th>
                    <th>Review Type</th>
                    <th>Term</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assessments as $assessment)
                    <tr>
                        <td>{{ $assessment->reviewer->name }}</td>
                        <td>{{ $assessment->reviewee->name }}</td>
                        <td>{{ $assessment->jobRole->name }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $assessment->review_type)) }}</td>
                        <td>{{ $assessment->calendar_term }}</td>
                        <td>
                            <a href="{{ route('assessments.show', $assessment->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('assessments.edit', $assessment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('assessments.destroy', $assessment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(auth()->user()->isAdmin())
        <a href="{{ route('assessments.create') }}" class="btn btn-primary mt-4">+ Create Assessment</a>
    @endif
</div>

@endsection

</x-app-layout>