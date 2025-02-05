<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Welcome, {{ auth()->user()->name }} 👋
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white   rounded-lg overflow-hidden p-6">
                 Some kind of really visual dashboard view goes here for when an admin wants to view buckets of users at a glance. Assessments completed / incomplete % in cards, ratings charts, lots of colors and hovering, users w tags for rank in org chart or maybe even photos etc, etc 
                <p>
                some feed of who did what as weel as a feed of most recent actions 
                </p>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
