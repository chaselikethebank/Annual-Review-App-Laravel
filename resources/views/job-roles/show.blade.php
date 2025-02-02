<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Guides for: ') }} {{ $jobRole->name }}
            </h2>
        
            <x-button-start href="{{ route('job-roles.index') }}" class="bg-gray-300 text-gray-700 ml-auto">
                Back
            </x-button-start>
        </div>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden p-6">
            <x-button-start href="{{ route('job-roles.guides.create', $jobRole->id) }}">+ Guide</x-button-start>

            <h2 class="text-lg font-semibold text-gray-800 my-3"></h2>

            @if($jobRole->guides->isEmpty())
            <p class="text-gray-600 my-3">No guides available for this job role.</p>
            @else
            <ul class="space-y-4">
                @foreach($jobRole->guides as $guide)
                <div class=" py-5">
                    <li class=" p-3">
                        <h3 class="font-semibold text-gray-800 text-md my-2">Guide Name: {{ $guide->title }}</h3>
                        <p class="text-gray-600 my-1"><span class="font-medium">Description:</span> {{ $guide->content
                            }}</p>
                        <p class="text-sm text-gray-500 my-1"><span class="font-medium">Created at:</span> {{
                            $guide->created_at->format('M d, Y') }}</p>
                        <p class="text-sm text-gray-500 my-1"><span class="font-medium">Updated at:</span> {{
                            $guide->updated_at->format('M d, Y') }}</p>

                        <div class="flex items-center space-x-4 my-4 py-3">
                            <x-button-start href="{{ route('job-roles.guides.edit', [$jobRole, $guide]) }}"
                                class="bg-yellow-500 text-white p-3 m-3">Edit</x-button-start>
                        </div>
                    </li>
                </div>
                @endforeach
            </ul>
            @endif

            <div class="flex items-center justify-space-between space-x-4 mt-6">
                <x-button-start href="{{ route('job-roles.index') }}" class="bg-gray-300 text-gray-700">Back
                </x-button-start>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>