<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">+ New Task</a>

        <ul class="bg-white shadow rounded p-4 space-y-2">
            @forelse ($tasks as $task)
                <li class="flex justify-between items-center">
                    <span>{{ $task->title }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li>No tasks yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
