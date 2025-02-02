<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Guide for Job Role: ') }} {{ $jobRole->name }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden p-6">
            <form action="{{ route('job-roles.guides.store', $jobRole) }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Guide Title</label>
                    <input type="text" name="title" id="title" 
                           class="my-3 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           placeholder="Enter guide title" required>
                </div>
        
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Guide Content</label>
                    <textarea name="content" id="content" rows="6" 
                              class="my-3 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                              placeholder="Enter the content of the guide" required></textarea>
                </div>
        
                <div class="flex items-center justify-between">
                    <x-button-start type="submit">Create Guide</x-button-start>
                    <x-button-start href="{{ route('job-roles.show', $jobRole) }}" class="bg-gray-300 text-gray-700">Back to This Job</x-button-start>
                </div>

                <div class="mt-6 ">
                    <x-button-start href="{{ route('job-roles.index') }}" class="bg-gray-300 text-gray-700">Back to All Jobs</x-button-start>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
