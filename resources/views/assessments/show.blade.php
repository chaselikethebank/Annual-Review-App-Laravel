<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assessment for {{ auth()->user()->name }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white  rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">User Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <p><strong>ID:</strong> {{ auth()->user()->id }}</p>
                            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Email Verified At:</strong> {{ auth()->user()->email_verified_at ?? 'Not Verified' }}</p>
                            <p><strong>Current Team ID:</strong> {{ auth()->user()->current_team_id ?? 'N/A' }}</p>
                            <p><strong>Profile Photo Path:</strong> {{ auth()->user()->profile_photo_path ?? 'N/A' }}</p>
                            <p><strong>Created At:</strong> {{ auth()->user()->created_at }}</p>
                            <p><strong>Updated At:</strong> {{ auth()->user()->updated_at }}</p>
                            <p><strong>Two Factor Confirmed At:</strong> {{ auth()->user()->two_factor_confirmed_at ?? 'N/A' }}</p>
                            <p><strong>Manager ID:</strong> {{ auth()->user()->manager_id ?? 'N/A' }}</p>
                            <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
                            <p><strong>Job Role ID:</strong> {{ auth()->user()->job_role_id }}</p>
                            <p><strong>Profile Photo:</strong> <img src="{{ auth()->user()->profile_photo_url }}" alt="Profile Photo" class="w-16 h-16 rounded-full"></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card">
            <div class="card-body">
                <p><strong>User Name:</strong> {{ auth()->user()->name}}</p>

                <h5 class="card-title">Review ID: {{ $assessment->review_id }}</h5>
                
                <!-- Display Job Role Name -->
                <p><strong>Job Role:</strong> {{ $jobRole->name }}</p>
                

                <!-- Display Review Type -->
                <p><strong>Review Type:</strong> {{ $review->type ?? 'N/A' }}</p>

                <!-- Display Guide Feedback and Ratings -->
                <h5>Guide Feedback and Ratings:</h5>
                @if(is_array($formattedGuideData) && count($formattedGuideData) > 0)
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
    </div>
</div>
        
    @endsection
</x-app-layout>
