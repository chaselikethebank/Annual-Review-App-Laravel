<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Behavioral') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Description</th>
                         
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($behaviorals as $behavior)
                    <tr class="border-t hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <x-link-start href="{{ route('behaviorals.show', $behavior) }}">
                                {{ $behavior->title }}
                            </x-link-start>
                        </td>
                         
                        <td class="px-6 py-4 text-sm text-gray-800 ">
                            {{ \Str::limit($behavior->description, 40) }}
                        </td>
                        
                        <td class="px-6 py-4 space-x-2">
                            <x-button-start href="{{ route('behaviorals.edit', $behavior) }}">Edit</x-button-start>
                            <form action="{{ route('behaviorals.destroy', $behavior) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <x-button-start type="submit" onclick="return confirm('Are you sure you want to delete this behavioral?');">
                                    Delete
                                </x-button-start>
                               
                            </form>
                            <x-button-start href="{{ route('behaviorals.show', $behavior) }}">Show Details</x-button-start>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4 flex justify-end">
                <x-button-start href="{{ route('behaviorals.create') }}">Create Behavioral Question</x-button-start>
            </div>
        </div>
    </div>
    @endsection

</x-app-layout>
