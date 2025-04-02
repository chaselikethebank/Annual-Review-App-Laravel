<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit General Qualifiers for {{ $generalQualifier->guide->title }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('general_qualifiers.update', $generalQualifier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-semibold">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $generalQualifier->title) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>

                        <!-- Note -->
                        <div class="mb-4">
                            <label for="note" class="block text-sm font-semibold">Note</label>
                            <textarea name="note" id="note" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('note', $generalQualifier->note) }}</textarea>
                        </div>

                        <!-- Rating -->
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-semibold">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                @foreach(range(1, 5) as $rating)
                                    <option value="{{ $rating }}" {{ $generalQualifier->rating == $rating ? 'selected' : '' }}>
                                        {{ $rating }}
                                    </option>
                                @endforeach
                            </select>
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
