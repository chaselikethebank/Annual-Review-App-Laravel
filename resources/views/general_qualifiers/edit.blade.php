<!-- resources/views/general_qualifiers/edit.blade.php -->

<x-app-layout>
    <x-slot name="header" style="shadow: none;">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit General Qualifier') }}: {{ $generalQualifier->title }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg overflow-hidden">
            <form action="{{ route('general_qualifiers.update', $generalQualifier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-6 py-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $generalQualifier->title) }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="px-6 py-4">
                    <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                    <textarea name="note" id="note" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('note', $generalQualifier->note) }}</textarea>
                    @error('note') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="px-6 py-4 flex justify-between space-x-2">
                    <x-button-start type="submit" color="blue">Update</x-button-start>
                    <x-button-start href="{{ route('general_qualifiers.index') }}" color="gray">Cancel</x-button-start>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
