<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Welcome, {{ auth()->user()->name }} 👋
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white   rounded-lg overflow-hidden p-6">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    
                    <!-- Profile Picture -->
                    <div class="flex-shrink-0">
                        <img src="{{ auth()->user()->profile_photo_url }}" 
                             alt="Profile Photo" 
                             class="w-24 h-24 rounded-full border-4 border-gray-300  ">
                    </div>

                    <!-- User Info -->
                    <div class="flex-1 space-y-2">
                        <h3 class="text-xl font-semibold text-gray-700">{{ auth()->user()->name }}</h3>
                        <p class="text-gray-600"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p class="text-gray-600"><strong>Role:</strong> {{ auth()->user()->role }}</p>
                        <p class="text-gray-600"><strong>Job Role ID:</strong> {{ auth()->user()->job_role_id }}</p>
                        <p class="text-gray-600"><strong>Manager ID:</strong> {{ auth()->user()->manager_id ?? 'N/A' }}</p>
                        <p class="text-gray-500 text-sm">Joined on: {{ auth()->user()->created_at->format('F j, Y') }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col space-y-2">
                        <x-button-start class="bg-blue-600 text-white hover:bg-blue-700">
                            Edit Profile
                        </x-button-start>

                        <x-link-start href="{{ route('logout') }}" 
                                      class="   text-sm font-semibold">
                            Logout
                        </x-link-start>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
