@extends('layouts.app')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Job Role') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-lg p-6">
            <form action="{{ route('job-roles.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold">Job Role Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('name') }}" required placeholder="Enter job role name">
                    
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between space-x-2">
                    <x-button-start type="submit" class="bg-green-600 hover:bg-green-700">Create Job Role</x-button-start>
                    <x-button-start href="{{ route('job-roles.index') }}" class="bg-gray-500 hover:bg-gray-600">Cancel</x-button-start>
                </div>
            </form>
        </div>
    </div>
    @endsection

</x-app-layout>
