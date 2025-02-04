<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            This assessment for {{ auth()->user()->name }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container">
        <h1>Assessment Details</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Review ID: {{ $assessment->review_id }}</h5>
                
                <!-- Display Job Role Name -->
                <p><strong>Job Role:</strong> {{ $jobRole->name }}</p>

                <!-- Display Review Type -->
                <p><strong>Review Type:</strong> {{ $review->type ?? 'N/A' }}</p>

                <!-- Display Guide Feedback and Ratings -->
                <h5>Guide Feedback and Ratings:</h5>
                @if(count($formattedGuideData) > 0)
                    @foreach ($formattedGuideData as $index => $guide)
                        <p><strong>Guide {{ $index + 1 }} ID:</strong> {{ $guide[0] ?? 'N/A' }}</p>
                        <p><strong>Guide {{ $index + 1 }} Title:</strong> {{ $guide[1] ?? 'N/A' }}</p>
                        <p><strong>Guide {{ $index + 1 }} Type:</strong> {{ $guide[2] ?? 'N/A' }}</p>
                        <p><strong>Guide {{ $index + 1 }} Rating:</strong> {{ $guide[3] ?? 'N/A' }}</p>
                        <p><strong>Guide {{ $index + 1 }} Extra Info:</strong> {{ $guide[4] ?? 'N/A' }}</p>
                    @endforeach
                @else
                    <p>No guide feedback available.</p>
                @endif

                <!-- Display Behavioral Feedback and Ratings -->
                <h5>Behavioral Feedback and Ratings:</h5>
                @if(count($behavioralRatings) > 0)
                    @foreach ($behavioralRatings as $index => $rating)
                        <p><strong>Behavioral {{ $index + 1 }} Rating:</strong> {{ $rating }}</p>
                        <p><strong>Behavioral {{ $index + 1 }} Feedback:</strong><br>{{ nl2br(e($behavioralFeedback[$index] ?? 'No feedback')) }}</p>
                    @endforeach
                @else
                    <p>No behavioral feedback available.</p>
                @endif
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
