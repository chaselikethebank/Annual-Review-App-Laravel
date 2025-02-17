<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Department') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg overflow-hidden">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="px-6 py-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Department Name</label>
                    <input type="text" name="name" id="name" class="w-full mt-1 px-4 py-2 border rounded-md" required>
                </div>

                 
                <div class="px-6 py-4 flex justify-end">
                    <x-button-start type="submit">Create Department</x-button-start>
                </div>
            </form>

            <div class="px-6 py-4">
                <x-button-start href="{{ route('departments.index') }}" class="text-blue-500">Back to Departments</x-button-start>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>
