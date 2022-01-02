<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <br>
                    <form action="{{ route('dashboard') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="w-1/2 shadow-lg focus:ring ring-blue-600 focus:ring-offset-2 mx-auto mt-5 h-12 text-lg w-32 border border-blue-800 rounded-lg text-blue-800 hover:text-white hover:bg-blue-700">
                            Click to see examples of sweetalert (toaster)
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
