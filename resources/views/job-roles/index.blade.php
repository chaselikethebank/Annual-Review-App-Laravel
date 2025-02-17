<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Roles for ' . $department->name) }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white  rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobRoles as $jobRole)
                    <tr class="border-t hover:bg-gray-50 transition duration-200">
                        
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <x-link-start href="{{ route('job-roles.show', $jobRole) }}"> {{ $jobRole->name }}</x-link-start></td>
                        <td class="px-6 py-4 space-x-2">
                            <x-button-start href="{{ route('job-roles.edit', $jobRole) }}">Edit Role</x-button-start>
                            <form action="{{ route('job-roles.destroy', $jobRole) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <x-button-start type="submit"
                                    onclick="return confirm('Are you sure you want to delete this job role?');">
                                    Delete Role
                                </x-button-start>
                            </form>
                            <x-button-start href="{{ route('job-roles.show', $jobRole) }}" > Show Role's Guides</x-button-start>
                            <x-button-start href="{{ route('job-roles.guides.create', $jobRole->id) }}">+ Guide
                            </x-button-start>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="px-6 py-4 flex justify-end">
                <x-button-start href="{{ route('job-roles.create') }}">Create Job Role</x-button-start>
            </div>

            <div class="px-6 py-4 flex justify-end">
                <x-button-start href="{{ route('departments.job-role.create', ['departmentId' => $department->id]) }}">
                    Create Job Role
                </x-button-start>
            </div> --}}
        </div>
    </div>
    @endsection

</x-app-layout>