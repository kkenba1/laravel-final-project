<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900 text-lg font-medium">
                    {{ __("You're logged in!") }}
                </div>
            </div>


            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 shadow-xl rounded-2xl p-10 text-white text-center">
                <h1 class="text-4xl font-bold mb-4 drop-shadow-md">Welcome to Task Manager</h1>
                <p class="text-lg mb-6">Organize, manage, and stay productive with ease.</p>
                <a href="{{ url('/task') }}">
                    <button class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-full shadow-md hover:bg-gray-100 transition duration-300">
                        My Task
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
