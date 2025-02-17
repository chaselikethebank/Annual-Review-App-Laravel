<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department Details') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg overflow-hidden">
            <h3 class="text-xl font-semibold text-gray-800">{{ $department->name }} Department</h3>

            <div class="mt-4">
                <h4 class="font-semibold text-lg">Job Roles in this Department</h4>
                <ul class="mt-2 space-y-2">
                    @foreach ($department->jobRoles as $jobRole)
                        <li class="border p-4 rounded-md bg-gray-50">
                            <h5 class="font-medium text-gray-800">{{ $jobRole->name }}</h5>
                            <p class="text-sm text-gray-600">Employees:</p>
                            <ul class="list-disc pl-6">
                                @foreach ($jobRole->users as $user)
                                    <li>{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-4">
                <x-button-start href="{{ route('departments.edit', $department) }}">Edit Department</x-button-start>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>
