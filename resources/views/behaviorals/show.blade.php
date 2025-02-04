<!-- resources/views/behaviorals/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Behavioral Question Detail') }}: {{ $behavioral->title }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Title -->
                    <p class="text-lg mb-4"><strong>Description:</strong> {{ $behavioral->description }}</p>

                    <!-- Qualifying Criteria -->
                    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                        @foreach (['qualifying_1', 'qualifying_2', 'qualifying_3', 'qualifying_4', 'qualifying_5'] as $qualifying)
                            <div class="bg-gray-100 p-4 rounded-lg ">
                                <h5 class="font-semibold text-lg mb-2">{{ ucfirst(str_replace('_', ' ', $qualifying)) }}:  {{ $behavioral->{$qualifying} }} </h5>
                                <p class="text-sm text-gray-500 mt-2 ml-6"><strong>Note:</strong> {{ $behavioral->{$qualifying.'_note'} }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex justify-between space-x-2">
                        <!-- Edit Button -->
                        <x-button-start href="{{ route('behaviorals.edit', $behavioral->id) }}" color="blue">
                            Edit
                        </x-button-start>

                        <x-button-start href="{{ route('behaviorals.index', $behavioral->id) }}" color="blue">
                            Back
                        </x-button-start>

                        {{-- <!-- Delete Button -->
                        <form action="{{ route('behaviorals.destroy', $behavioral->id) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <x-button-start type="button" color="red" onclick="confirmDelete()">
                                Delete
                            </x-button-start>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script>
            function confirmDelete() {
                if (confirm('Are you sure you want to delete this behavioral question? This action cannot be undone.')) {
                    document.getElementById('delete-form').submit();
                }
            }
        </script>
    @endsection
</x-app-layout>
