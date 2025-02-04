<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessment for ') }} {{ $review->reviewee->name }} // Type: {{$review->review_type}}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Review for: {{ $review->reviewee->name }} ({{ $review->jobRole->title }})</h3>
            </div>

            <form action="{{ route('assessments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="review_id" value="{{ $review->id }}">
                <input type="hidden" name="job_role_id" value="{{ $review->job_role_id }}">

                {{-- Job-Specific Guides --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Guides for Job Role: {{ $review->jobRole->title }}</h3>
                    @foreach ($guides as $guide)
                        <div class="mb-4 p-4 border rounded-lg">
                            <h4 class="text-xl font-semibold">{{ $guide->title }}</h4>
                            <p class="mt-2 text-gray-700">{{ $guide->content }}</p>
                            <p class="mt-2 text-gray-700">ID: {{ $guide->id }}</p>

                          

                            <div class="mt-4">
                                <label for="guide_{{ $guide->id }}_rating" class="block text-gray-700">
                                    Rate {{ $guide->title }}:
                                </label>
                                <select class="p-3 m-4 rounded-lg border w-1/4 focus:ring-2 focus:ring-indigo-500"
                                        name="guides[{{ $guide->id }}][rating]" id="guide_{{ $guide->id }}_rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="guide_{{ $guide->id }}_comment" class="block text-gray-700">
                                    Explain your rating:
                                </label>
                                <textarea name="guides[{{ $guide->id }}][feedback]" 
                                        id="guide_{{ $guide->id }}_comment" 
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Enter your comments..."></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Behavioral Questions --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Organization-Wide Behavioral Questions</h3>
                    @foreach ($behavioralQuestions as $question)
                        <div class="mb-4 p-4 border rounded-lg">
                            <h4 class="text-xl font-semibold">{{ $question->title }}</h4>
                            <p class="mt-2 text-gray-700">{{ $question->description }}</p>
                            <p class="mt-2 text-gray-700">ID: {{ $question->id }}</p>

                            <div class="mt-4">
                                <label for="behavioral_{{ $question->id }}_rating" class="block text-gray-700">
                                    Rate {{ $question->title }}:
                                </label>
                                <select class="p-3 m-4 rounded-lg border w-1/4 focus:ring-2 focus:ring-indigo-500"
                                        name="behavioral[{{ $question->id }}][rating]" id="behavioral_{{ $question->id }}_rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="behavioral_{{ $question->id }}" class="block text-gray-700">
                                    Your Response:
                                </label>
                                <textarea name="behavioral[{{ $question->id }}][response]" 
                                        id="behavioral_{{ $question->id }}" 
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Enter your answer..."></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-between space-x-2">
                    <x-button-start type="submit" class="bg-green-600 hover:bg-green-700">
                        Submit Assessment
                    </x-button-start>
                </div>
            </form>



            {{-- Error Handling --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    @endsection
</x-app-layout>
