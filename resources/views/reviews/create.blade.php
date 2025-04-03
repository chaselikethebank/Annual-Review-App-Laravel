<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Review') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-semibold mb-4">Create Review</h1>
        
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="reviewee" class="block text-sm font-medium text-gray-700">Reviewee</label>
                <select name="reviewee_id" id="reviewee" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->jobRole->name }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="job_role" class="block text-sm font-medium text-gray-700">Job Role</label>
                <select name="job_role_id" id="job_role" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($jobRoles as $jobRole)
                        <option value="{{ $jobRole->id }}">{{ $jobRole->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="review_type" class="block text-sm font-medium text-gray-700">Review Type</label>
                <select name="review_type" id="review_type" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="self">Self</option>
                    <option value="peer">Peer</option>
                    <option value="manager">Manager</option>
                    <!-- Add other review types if needed -->
                </select>
            </div>

            <div class="mb-4">
                <label for="calendar_term" class="block text-sm font-medium text-gray-700">Calendar Term</label>
                <input type="text" name="calendar_term" id="calendar_term" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="e.g., 2025 Q1" required>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Qualifiers</h3>

                <div class="mt-4">
                    <h4 class="font-medium text-sm">General Qualifiers</h4>
                    <div class="space-y-2">
                        @foreach($generalQualifiers as $qualifier)
                            <div class="flex items-center">
                                <input type="checkbox" name="general_qualifiers[]" value="{{ $qualifier->id }}" id="general_qualifier_{{ $qualifier->id }}" class="mr-2">
                                <label for="general_qualifier_{{ $qualifier->id }}" class="text-sm">{{ $qualifier->title }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <h4 class="font-medium text-sm">Behavioral Qualifiers</h4>
                    <div class="space-y-2">
                        @foreach($behavioralQualifiers as $qualifier)
                            <div class="flex items-center">
                                <input type="checkbox" name="behavioral_qualifiers[]" value="{{ $qualifier->id }}" id="behavioral_qualifier_{{ $qualifier->id }}" class="mr-2">
                                <label for="behavioral_qualifier_{{ $qualifier->id }}" class="text-sm">{{ $qualifier->title }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Review</button>
        </form>
    </div>
</x-app-layout>
