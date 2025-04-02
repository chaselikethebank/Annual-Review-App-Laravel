<x-app-layout>
    <x-slot name="header" style="shadow: none;">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General Qualifiers') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="px-6 py-4 flex justify-end">
            <x-button-start href="{{ route('general_qualifiers.create') }}">+ Qualifier</x-button-start>
        </div>

        <div class="bg-white rounded-lg overflow-hidden" x-data="{ openGuide: null }">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Job Role</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Guide Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Guide ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guides as $guide)
                        <!-- Skip if no job role or no qualifiers -->
                        @if (!$guide->jobRole || $guide->generalQualifiers->isEmpty())
                            @continue
                        @endif
                        
                        <tr class="border-t hover:bg-gray-50 transition duration-200"
                            @click="openGuide = (openGuide === {{ $guide->id }} ? null : {{ $guide->id }})"
                            class="cursor-pointer">
                            <td class="px-6 py-4 text-sm text-gray-800 font-semibold">
                                <span x-show="openGuide !== {{ $guide->id }}">▶</span>
                                <span x-show="openGuide === {{ $guide->id }}">▼</span>
                                {{ $guide->jobRole->name }}  
                               
                            </td>
                            
                            <td class="px-6 py-4 text-sm text-gray-800 font-semibold">{{ $guide->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $guide->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $guide->content }}</td>
                        </tr>

                        <!-- Qualifiers Row (Expands when clicked) -->
                        <tr x-show="openGuide === {{ $guide->id }}" class="border-b">
                            <td colspan="5" class="px-6 py-4">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Title</th>
                                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Note</th>
                                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Rating</th>
                                            <th>
                                                <div>
                                                    <x-button-start type="submit" onclick="return confirm('Are you sure you want to delete all general qualifiers for this guide?');">
                                                        Destroy Qualifiers
                                                    </x-button-start>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guide->generalQualifiers as $qualifier)
                                            <tr class="border-t hover:bg-gray-50 transition duration-200 cursor-pointer" @click="window.location.href='{{ route('general_qualifiers.edit', $qualifier) }}'">
                                                <td class="px-6 py-4 text-sm text-gray-800">{{ $qualifier->title }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800">{{ $qualifier->note }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-800">{{ $qualifier->rating }}/5</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</x-app-layout>
