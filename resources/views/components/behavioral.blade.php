<div class="mb-4">
    <label for="q1" class="block text-gray-700 font-semibold">Question 1: How would you rate your teamwork?</label>
    <input type="number" name="q1" id="q1" min="1" max="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('q1') }}" required placeholder="1 to 5">
    @error('q1')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="q2" class="block text-gray-700 font-semibold">Question 2: How would you rate your problem-solving skills?</label>
    <input type="number" name="q2" id="q2" min="1" max="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('q2') }}" required placeholder="1 to 5">
    @error('q2')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="q3" class="block text-gray-700 font-semibold">Question 3: How would you rate your communication skills?</label>
    <input type="number" name="q3" id="q3" min="1" max="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('q3') }}" required placeholder="1 to 5">
    @error('q3')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="q4" class="block text-gray-700 font-semibold">Question 4: How would you rate your leadership skills?</label>
    <input type="number" name="q4" id="q4" min="1" max="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('q4') }}" required placeholder="1 to 5">
    @error('q4')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
