<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Answer
        </h2>
    </x-slot>

    @section('content')
    <div class="container">
        <h1>Submit an Answer for Review: {{ $review->id }}</h1>

        <form action="{{ route('answers.store', $review->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="qualifier_id">Qualifier</label>
                <select name="qualifier_id" id="qualifier_id" class="form-control" required>
                    <option value="">Select a qualifier</option>
                    @foreach ($qualifiers as $qualifier)
                        <option value="{{ $qualifier->id }}" {{ old('qualifier_id') == $qualifier->id ? 'selected' : '' }}>
                            {{ $qualifier->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required value="{{ old('rating') }}">
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control" rows="4">{{ old('comment') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Answer</button>
        </form>
    </div>
@endsection
