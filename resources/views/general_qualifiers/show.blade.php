<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General Qualifier') }}: {{ $guide->title }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <p class="text-lg mb-4"><strong>{{ $guide->title }}</strong></p>

                    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                        @foreach ($guide->generalQualifiers as $qualifier)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <h5 class="font-semibold text-lg mb-2">{{ $qualifier->title }} ({{ $qualifier->rating }}/5)</h5>
                                <hr>
                                <p class="text-sm text-gray-500 mt-2 ml-6"><strong>Note:</strong> {{ $qualifier->note }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex justify-between space-x-2">
                        <x-button-start href="{{ route('general_qualifiers.edit', $generalQualifier->id) }}" color="blue">Edit</x-button-start>
                        
                        <form action="{{ route('general_qualifiers.destroy', $guide) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <x-button-start type="button" color="red" onclick="confirmDelete()">Delete</x-button-start>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script>
            function confirmDelete() {
                if (confirm('Are you sure you want to delete this guide? This action cannot be undone.')) {
                    document.getElementById('delete-form').submit();
                }
            }
        </script>
    @endsection
</x-app-layout>
