<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General Qualifiers') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Guide</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generalQualifiers as $qualifier)
                    <tr class="border-t hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-800">
                            <x-link-start href="{{ route('general_qualifiers.show', $qualifier) }}">
                                {{ $qualifier->title }}
                            </x-link-start>
                        </td>
                         
                        <td class="px-6 py-4 text-sm text-gray-800">
                            {{ $qualifier->guide->name }}
                        </td>
                        
                        <td class="px-6 py-4 space-x-2">
                            <x-button-start href="{{ route('general_qualifiers.edit', $qualifier) }}">Edit</x-button-start>
                            <form action="{{ route('general_qualifiers.destroy', $qualifier) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <x-button-start type="submit" onclick="return confirm('Are you sure you want to delete this qualifier?');">
                                    Delete
                                </x-button-start>
                            </form>
                            <x-button-start href="{{ route('general_qualifiers.show', $qualifier) }}">Show Details</x-button-start>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4 flex justify-end">
                <x-button-start href="{{ route('general_qualifiers.create') }}">Create General Qualifier</x-button-start>
            </div>
            <div class="px-6 py-4">
                {{-- {{ $generalQualifiers->links() }} --}}
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
