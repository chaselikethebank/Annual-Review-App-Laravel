<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job Role') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white  rounded-lg overflow-hidden p-6">
            <form action="{{ route('job-roles.update', $jobRole) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Job Role Name</label>
                    <input type="text" name="name" id="name" 
                           class="my-3 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           value="{{ $jobRole->name }}" required>
                </div>

                <div class="flex items-center justify-between">
                    <x-button-start type="submit">Update Job Role's Name</x-button-start>
                    <x-button-start href="{{ route('job-roles.index') }}" class="bg-gray-300 text-gray-700">Cancel</x-button-start>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
