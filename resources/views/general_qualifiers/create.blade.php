<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create General Qualifier') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('general_qualifiers.store') }}" method="POST">
                @csrf

                <!-- Title Field -->
                <div class="mb-4">
                    <x-label for="title" value="Title" />
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <x-label for="description" value="Description" />
                    <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md" name="description" rows="4"
                        required></textarea>
                </div>

                <!-- Select Guide Field -->
                <div class="mb-4">
                    <x-label for="guide_id" value="Select Guide" />
                    <select id="guide_id" class="block mt-1 w-full border-gray-300 rounded-md" name="guide_id" required>
                        <option value="">-- Select Guide --</option>
                        @foreach ($guides as $guide)
                            <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Qualifiers Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Qualifiers</h3>

                    @foreach (range(1, 5) as $rating)
                        <div class="mb-4 p-4 border rounded-lg bg-gray-50">
                            <h4 class="text-md font-medium mb-2">Rating {{ $rating }}/5</h4>

                            <div class="mb-2">
                                <x-label for="qualifiers[{{ $rating }}][title]" value="Title" />
                                <x-input id="qualifiers[{{ $rating }}][title]" class="block mt-1 w-full"
                                    type="text" name="qualifiers[{{ $rating }}][title]" required />
                            </div>

                            <div class="mb-2">
                                <x-label for="qualifiers[{{ $rating }}][note]" value="Note" />
                                <textarea id="qualifiers[{{ $rating }}][note]" class="block mt-1 w-full border-gray-300 rounded-md"
                                    name="qualifiers[{{ $rating }}][note]" rows="3" required></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Action buttons -->
                <div class="flex justify-between space-x-2">
                    <x-button-start type="submit">Save</x-button-start>
                    <x-button-start href="{{ route('general_qualifiers.index') }}">Cancel</x-button-start>
                </div>
            </form>
        </div>
    </div>
    @endsection

</x-app-layout>
