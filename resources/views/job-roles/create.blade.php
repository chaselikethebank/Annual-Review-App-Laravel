<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Job Role for: ') }} {{ $department->name }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('job-roles.store', $department->id) }}" method="POST">
                @csrf

                <!-- Hidden Department ID Field -->
                <input type="hidden" name="department_id" value="{{ $department->id }}">

                <!-- Name Field -->
                <div class="mb-4">
                    <x-label for="name" value="Job Role Name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <x-label for="description" value="Description" />
                    <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md" name="description" rows="4" required></textarea>
                </div>

                <td class="px-6 py-4 space-x-2">
                    <x-button-start href="{{ route('job-roles.create', ['departmentId' => $department->id]) }}">
                        Create Job Role
                    </x-button-start>
                </td>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
