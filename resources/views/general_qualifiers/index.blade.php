<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjective Qualifiers') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Job Role</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Guide Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guides as $guide)
                        @if (!$guide->jobRole || $guide->generalQualifiers->isEmpty())
                            @continue
                        @endif
                        <tr class="border-t hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-800 font-semibold">
                                {{ $guide->jobRole->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 font-semibold">
                                <x-link-start href="{{ route('general_qualifiers.show', $guide->generalQualifiers->first()) }}">
                                    {{ $guide->title }}
                                </x-link-start>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                 
                                <x-button-start href="{{ route('general_qualifiers.show', $guide->generalQualifiers->first()) }}">Show Details</x-button-start>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
    </div>
    @endsection
</x-app-layout>
