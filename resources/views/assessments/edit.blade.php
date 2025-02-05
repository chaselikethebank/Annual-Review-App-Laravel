<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessment for ') }} {{ $assessment->reviewee->name }} // Type: {{$assessment->review_type}}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Review for: {{ $assessment->reviewee->name }} ({{ $assessment->jobRole->title }})</h3>
            </div>

            <form action="{{ route('assessments.update', $assessment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="review_id" value="{{ $assessment->review->id }}">
                <input type="hidden" name="job_role_id" value="{{ $assessment->review->job_role_id }}">

                {{-- Job-Specific Guides --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Guides for Job Role: {{ $assessment->review->jobRole->title }}</h3>
                    @foreach ($guides as $guide)
                        <div class="mb-4 p-4 border rounded-lg">
                            <h4 class="text-xl font-semibold">{{ $guide->title }}</h4>
                            <p class="mt-2 text-gray-700">{{ $guide->content }}</p>

                            <div class="mt-4">
                                <label for="guide_{{ $guide->id }}_rating" class="block text-gray-700">Rate {{ $guide->title }}:</label>
                                <select class="p-3 m-4 rounded-lg border w-1/4 focus:ring-2 focus:ring-indigo-500"
                                        name="guides[{{ $guide->id }}][rating]" id="guide_{{ $guide->id }}_rating" required>
                                    @foreach(range(1, 5) as $i)
                                        <option value="{{ $i }}" {{ $assessment->guides->where('id', $guide->id)->first()->pivot->rating == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="guide_{{ $guide->id }}_comment" class="block text-gray-700">Explain your rating:</label>
                                <textarea name="guides[{{ $guide->id }}][feedback]" 
                                        id="guide_{{ $guide->id }}_comment" 
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Enter your comments...">{{ $assessment->guides->where('id', $guide->id)->first()->pivot->feedback }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Behavioral Questions --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Behavioral Questions</h3>
                    @foreach ($behavioralQuestions as $question)
                        <div class="mb-4 p-4 border rounded-lg">
                            <h4 class="text-xl font-semibold">{{ $question->title }}</h4>

                            <div class="mt-4">
                                <label for="behavioral_{{ $question->id }}_rating" class="block text-gray-700">Rate {{ $question->title }}:</label>
                                <select class="p-3 m-4 rounded-lg border w-1/4 focus:ring-2 focus:ring-indigo-500"
                                        name="behavioral[{{ $question->id }}][rating]" id="behavioral_{{ $question->id }}_rating" required>
                                    @foreach(range(1, 5) as $i)
                                        <option value="{{ $i }}" {{ $assessment->behaviorals->where('id', $question->id)->first()->pivot->rating == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="behavioral_{{ $question->id }}" class="block text-gray-700">Your Response:</label>
                                <textarea name="behavioral[{{ $question->id }}][response]" 
                                        id="behavioral_{{ $question->id }}" 
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Enter your response...">{{ $assessment->behaviorals->where('id', $question->id)->first()->pivot->response }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-between space-x-2">
                    <x-button-start type="submit" class="bg-green-600 hover:bg-green-700">Update Assessment</x-button-start>
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
