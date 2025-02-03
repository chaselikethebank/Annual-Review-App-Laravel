<div class="bg-white shadow-xl rounded-lg overflow-hidden">
    @if ($items->isEmpty())
        <p class="text-gray-600 p-4">{{ $emptyMessage }}</p>
    @else
        <table class="w-full table-auto">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Reviewer</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Reviewee</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Job Role</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Review Type</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Term</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody id="{{ $tableId }}">
                @foreach ($items as $item)
                    <tr class="border-t hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-800 reviewer">
                            {{ $item->reviewer ? $item->reviewer->name : 'No reviewer assigned' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800 reviewee">
                            {{ $item->reviewee ? $item->reviewee->name : 'No reviewee assigned' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            {{ $item->jobRole ? $item->jobRole->name : 'No job role assigned' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            {{ $item->review_type }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            {{ $item->calendar_term }}
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <x-button-start href="{{ route($routeName, $item->id) }}">
                                {{ $buttonText }}
                            </x-button-start>
                            
                            @if($isAdmin)
                                {{-- <x-button-start href="{{ route($editRoute, $item->id) }}" class="text-yellow-600">
                                    Edit
                                </x-button-start> --}}
                                {{-- <form action="{{ route($deleteRoute, $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <x-button-start type="submit" onclick="return confirm('Are you sure?');" class="text-red-600">
                                        Delete
                                    </x-button-start>
                                </form> --}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 flex justify-end">
            <x-button-start>
                <a href="{{ route($createRoute) }}">+ {{ $createText }}</a>
            </x-button-start>
        </div>
    @endif
</div>
