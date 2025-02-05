<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reviews Assigned to {{ auth()->user()->name }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (auth()->user()->isAdmin())
                <h3 class="text-lg font-medium"></h3>
            @else
                <h3 class="text-lg font-medium">My Reviews and Assessments</h3>
            @endif

            <div class="flex pb-4 mb-4 mx-4">
                <!-- Search Reviewer -->
                <input type="text" id="searchReviewer" class="border p-2 rounded" placeholder="Search Reviewer">
            </div>

            <script>
            document.getElementById('searchReviewer').addEventListener('input', function () {
                filterTable('reviewer', this.value.toLowerCase());
            });

            document.getElementById('searchReviewee').addEventListener('input', function () {
                filterTable('reviewee', this.value.toLowerCase());
            });

            function filterTable(className, searchTerm) {
                document.querySelectorAll(`#reviewsTable tr`).forEach(row => {
                    const text = row.querySelector(`.${className}`)?.textContent.toLowerCase() || '';
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            }
            </script>

            <div class="bg-white rounded-lg overflow-hidden">
                @if ($reviews->isNotEmpty())
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Reviewer</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Reviewee</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reviewsTable">
                            @foreach ($reviews as $review)
                            <tr class="border-t hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $review->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $review->reviewee->name }}</td>
                                <td class="px-6 py-4">
                                    @if ($review->assessments->isEmpty())
                                        <x-button-start href="{{ route('assessments.create', $review->id) }}">
                                            Begin Assessment
                                        </x-button-start>
                                    @else
                                        @php
                                            $assessment = $review->assessments->first();
                                        @endphp
                                        @if ($assessment && ($assessment->status === null || $assessment->status == 0))
                                            <x-button-start href="{{ route('assessments.show', $assessment->id) }}">
                                                Continue Assessment
                                            </x-button-start>
                                           {{-- <span class="text-sm text-yellow-500 !important">Incomplete</span> --}}
                                        @elseif ($assessment && $assessment->status == 1)
                                            <x-button-start href="{{ route('assessments.edit', $assessment->id) }}">
                                                Continue Assessment
                                            </x-button-start>
                                            <span class="text-sm text-green-500">Complete</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">No pending reviews.</p>
                @endif

                @if ($assessments->isNotEmpty())
                    <h4 class="font-medium text-gray-700 mt-6">Assigned Assessments</h4>
                    <table class="w-full table-auto mt-2">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Job Role</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Guide</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reviewsTable">
                            @foreach ($assessments as $assessment)
                                <tr class="border-t hover:bg-gray-50 transition duration-200">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $assessment->jobRole->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $assessment->guide->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                        @if ($assessment->status)
                                            <span class="text-green-500">Complete</span>
                                        @else
                                            <span class="text-yellow-500">Incomplete</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-button-start href="{{ route('assessments.show', $assessment->id) }}">
                                            Continue Assessment
                                        </x-button-start>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
