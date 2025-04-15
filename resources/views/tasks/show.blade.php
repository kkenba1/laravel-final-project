<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Task') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $task->title }}</h3>
            <p class="text-gray-700">{{ $task->notes ?? 'No additional notes.' }}</p>
            <div class="mt-6">
                <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">← Back to tasks</a>
            </div>
        </div>
    </div>
</x-app-layout>
