<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Review') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white  rounded-lg p-6">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                
                
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-semibold">Reviewer</label>
                    <select name="user_id" id="user_id" class="w-full border-gray-300 rounded-lg  ">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="review_type" class="block text-gray-700 font-semibold">Assessment Type </label>
                    <select name="review_type" id="review_type" class="w-full border-gray-300 rounded-lg  ">
                        <option value="self_assessment">Self</option>
                        <option value="manager_feedback">Manager</option>
                        <option value="peer_feedback">Peer</option>
                        <option value="subordinate_feedback">Subordinate</option>
                        <option value="client_feedback">Client</option>
                        <option value="external_feedback">External</option>
                        <option value="behavioral_feedback">Behavioral</option>
                    </select>
                </div>
                
                {{-- add a conditional for if review type is self reviewee is posted to db as reviewer's user name but also doesn't show a view for reviewee --}}
               
                <div class="mb-4">
                    <label for="reviewee_id" class="block text-gray-700 font-semibold">Reviewee</label>
                    <select name="reviewee_id" id="reviewee_id" class="w-full border-gray-300 rounded-lg  ">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="job_role_id" class="block text-gray-700 font-semibold">Job Role</label>
                    <select name="job_role_id" id="job_role_id" class="w-full border-gray-300 rounded-lg  ">
                        @foreach ($jobRoles as $jobRole)
                            <option value="{{ $jobRole->id }}">{{ $jobRole->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="calendar_term" class="block text-gray-700 font-semibold">Calendar Term</label>
                    <select name="calendar_term" id="calendar_term" class="w-full border-gray-300 rounded-lg  ">
                        <option value="2024-2025">2024-2025</option>
                        <option value="2025-2026">2025-2026</option>
                        <option value="2026-2027">2026-2027</option>
                    </select>
                </div>

                <div class="flex justify-end mt-4">
                    <x-button-start type="submit">Create Review</x-button-start>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>

