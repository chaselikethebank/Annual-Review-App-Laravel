<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Subjective Qualifiers for {{ $guide->title }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Edit Form -->
                    <form action="{{ route('general_qualifiers.update', $guide->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Loop through all qualifiers for this guide -->
                        <h4 class="text-xl font-semibold mb-4">Edit Qualifiers:</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                            @foreach ($qualifiers as $qualifier)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                    <input type="hidden" name="qualifiers[{{ $qualifier->id }}][id]" value="{{ $qualifier->id }}">

                                    <!-- Title -->
                                    <label for="title_{{ $qualifier->id }}" class="block text-sm font-semibold">
                                        Title ({{ $qualifier->rating }}/5)
                                    </label>
                                    <input type="text" name="qualifiers[{{ $qualifier->id }}][title]" id="title_{{ $qualifier->id }}" 
                                           value="{{ old('qualifiers.' . $qualifier->id . '.title', $qualifier->title) }}" 
                                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>

                                    <!-- Note -->
                                    <label for="note_{{ $qualifier->id }}" class="block text-sm font-semibold mt-2">Note</label>
                                    <textarea name="qualifiers[{{ $qualifier->id }}][note]" id="note_{{ $qualifier->id }}" 
                                              rows="2" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('qualifiers.' . $qualifier->id . '.note', $qualifier->note) }}</textarea>
                                </div>
                            @endforeach
                        </div>

                        <!-- Save Button -->
                        <div class="mt-6 flex justify-between space-x-2">
                            <x-button-start type="submit" color="green">
                                Save Changes
                            </x-button-start>
                            <a href="{{ route('general_qualifiers.index') }}" class="ml-4">
                                <x-button-start color="gray">
                                    Cancel
                                </x-button-start>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
