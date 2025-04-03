<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Job Role for: ') }} {{ $department->name }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('departments.job-roles.store', $department) }}" method="POST">
                @csrf
                <p>Department: {{ $department->name }}</p>
                
                <div class="mb-4">
                    <x-label for="name" value="Job Role Name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                </div>
                
                <x-button type="submit">Create Job Role</x-button>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
