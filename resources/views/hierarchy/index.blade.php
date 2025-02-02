<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hierarchy') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class=" ">
                {{-- Render hierarchy --}}
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Manager</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Subordinates</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hierarchies as $manager)
                        <tr class="border-t hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 text-sm text-gray-800 font-semibold">{{ $manager->name }}</td>
                            <td class="px-6 py-4">
                                <ul class="list-disc ml-4 text-sm text-gray-600">
                                    @foreach($manager->subordinates as $subordinate)
                                    <li>{{ $subordinate->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                
                                <x-button-start href="{{ route('hierarchy.assign') }}">+ Add Subordinate</x-button-start>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        
        <h2 class="py-6 m-3">*Note: this is fine with a reasonable number of users 10-30, but once there are hundreds, need to add a search/filter UI component</h2>
    </div>
    
    @endsection

</x-app-layout>
