<!-- resources/views/behaviorals/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Behavioral Question') }}: {{ $behavioral->title }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Edit Form -->
                    <form action="{{ route('behaviorals.update', $behavioral->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-semibold">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $behavioral->title) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-semibold">Description</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>{{ old('description', $behavioral->description) }}</textarea>
                        </div>

                        <!-- Qualifying Criteria -->
                        <h4 class="text-xl font-semibold mb-4">Qualifying Criteria:</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                            @foreach (['qualifying_1', 'qualifying_2', 'qualifying_3', 'qualifying_4', 'qualifying_5'] as $qualifying)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                    <label for="{{ $qualifying }}" class="block text-sm font-semibold">{{ ucfirst(str_replace('_', ' ', $qualifying)) }}</label>
                                    <input type="text" name="{{ $qualifying }}" id="{{ $qualifying }}" value="{{ old($qualifying, $behavioral->{$qualifying}) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                    
                                    <label for="{{ $qualifying.'_note' }}" class="block text-sm font-semibold mt-2">Note</label>
                                    <textarea name="{{ $qualifying.'_note' }}" id="{{ $qualifying.'_note' }}" rows="2" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old($qualifying.'_note', $behavioral->{$qualifying.'_note'}) }}</textarea>
                                </div>
                            @endforeach
                        </div>

                        <!-- Save Button -->
                        <div class="mt-6  flex justify-between space-x-2">
                            <x-button-start type="submit" color="green">
                                Save Changes
                            </x-button-start>
                            <a href="{{ route('behaviorals.show', $behavioral->id) }}" class="ml-4">
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
