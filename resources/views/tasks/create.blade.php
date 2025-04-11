<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
