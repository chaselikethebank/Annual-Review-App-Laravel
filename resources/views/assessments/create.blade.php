<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessment for ') }} {{ $userJobRole->name }} Guide
        </h2>
    </x-slot>

    @section('content')
        @if ($userJobRole)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Review: {{ $review->title }}</h3>
                <p>{{ $review->description }}</p>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Guides for Job Role: {{ $userJobRole->name }}</h3>
                @foreach ($guides as $guide)
                    <div class="mb-4 p-4 border rounded-lg">
                        <h4 class="text-xl font-semibold">{{ $guide->title }}</h4>
                        <p class="mt-2 text-gray-700">{{ $guide->content }}</p>

                        <div class="mt-4">
                            <label for="guide_{{ $guide->id }}_rating" class="block text-gray-700">Rating</label>
                            <select name="guide_{{ $guide->id }}_rating" id="guide_{{ $guide->id }}_rating" class="px-4 py-2 border rounded-lg w-1/4 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="guide_{{ $guide->id }}_comment" class="block text-gray-700">Explain your rating...</label>
                            <textarea name="guide_{{ $guide->id }}_comment" id="guide_{{ $guide->id }}_comment" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter your comments..."></textarea>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-red-500">The user does not have a job role assigned.</p>
        @endif

        <form action="{{ route('assessments.store') }}" method="POST">
            @csrf
            <div class="flex justify-between space-x-2">
                <x-button-start type="submit" class="bg-green-600 hover:bg-green-700">Submit Assessment</x-button-start>
            </div>
        </form>
    @endsection
</x-app-layout>
