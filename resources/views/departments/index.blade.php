<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg overflow-hidden">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr class="border-t hover:bg-gray-50 transition duration-200">

                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{-- Link to show department roles (list of job roles) --}}
                                    <x-link-start href="{{ route('departments.job-roles.index', $department) }}">
                                        {{ $department->name }}
                                    </x-link-start>
                                </td>

                                <td class="px-6 py-4 space-x-2">
                                    <x-button-start href="{{ route('departments.edit', $department) }}">Edit</x-button-start>
                                    <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <x-button-start type="submit" onclick="return confirm('Are you sure you want to delete this department?');">
                                            Delete
                                        </x-button-start>
                                    </form>
                                    <x-button-start href="{{ route('departments.job-roles.create', $department) }}">
                                        Create Job Role
                                    </x-button-start>
                                    </td> 
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4 flex justify-end">
                    <x-button-start href="{{ route('departments.create') }}">Create New Department</x-button-start>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
