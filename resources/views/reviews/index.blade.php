<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review Context List') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

            <div class="bg-white  rounded-lg overflow-hidden">

              
               
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Reviewer</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Reviewee</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Job Role</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Review Type</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Term</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Review ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reviewsTable">
                            @foreach ($reviews as $review)
                                <tr class="border-t hover:bg-gray-50 transition duration-200">
                                
                                    <td class="px-6 py-4 text-sm text-gray-800 reviewer">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 reviewee">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 reviewer">
                                       
                                           
                                      
                                            No assessment available
                                 
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        {{-- <x-button-start href="{{ route('reviews.show', $review->id) }}">View</x-button-start> --}}
                                        {{-- <x-button-start href="{{ route('reviews.edit', $review->id) }}" class="text-yellow-600">Edit</x-button-start> --}}
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <x-button-start type="submit" onclick="return confirm('Are you sure?');" class="text-red-600">
                                                Delete
                                            </x-button-start>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4 flex justify-end">
                        <x-button-start>
                            <a href="{{ route('reviews.create') }}">+ Create Review</a>
                        </x-button-start>
                    <div>
          
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>

