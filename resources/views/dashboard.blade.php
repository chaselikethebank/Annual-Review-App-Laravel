<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Welcome, {{ auth()->user()->name }} 👋 || This is your Dashboard 
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  rounded-lg overflow-hidden p-6">

                    <!-- Metrics Cards Section -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Total Active Users -->
                    </div>

                    <h1>{{ auth()->user()->name }}</h1>
            
                    <h3>Users List</h3>
                    @foreach(\App\Models\User::all() as $user)
                    <p>{{ $user->name }} - {{ $user->jobRole->name ?? 'N/A' }}</p>
                
                    @endforeach
            
                    <!-- Debugging: Dump Users -->
                    {{-- {{ dd(\App\Models\User::all()) }} --}}
                     
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
