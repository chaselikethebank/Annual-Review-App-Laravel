<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Behavioral Question') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <form action="{{ route('behaviorals.store') }}" method="POST">
                @csrf
                <div class="px-6 py-4">

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                        <input type="text" id="title" name="title" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('title') }}" required>
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Qualifiers (1-5) -->
                    @foreach (range(1, 5) as $i)
                        <div class="mb-4">
                            <label for="qualifying_{{ $i }}" class="block text-sm font-medium text-gray-600">Name the Qualifier for a rating of {{ $i }}/5</label>
                            <textarea id="qualifying_{{ $i }}" name="qualifying_{{ $i }}" rows="3" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('qualifying_' . $i) }}</textarea>
                            @error('qualifying_' . $i) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="qualifying_{{ $i }}_note" class="block text-sm font-medium text-gray-600">Qualifying Note for {{ $i }}/5</label>
                            <textarea id="qualifying_{{ $i }}_note" name="qualifying_{{ $i }}_note" rows="3" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('qualifying_' . $i . '_note') }}</textarea>
                            @error('qualifying_' . $i . '_note') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endforeach

                    <!-- Action buttons -->
                    <div class="flex justify-between space-x-2">
                        <x-button-start type="submit">Save</x-button-start>
                        <x-button-start href="{{ route('behaviorals.index') }}">Cancel</x-button-start>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @endsection

</x-app-layout>
