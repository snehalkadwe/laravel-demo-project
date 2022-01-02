<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload File') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
        <x-success>
            {{ session()->get('success') }}
        </x-success>
    @endif
    @if (Session::has('error'))
        <x-error>
            {{ session()->get('error') }}
        </x-error>
    @endif

    <div class="py-12">
        <h1 class="text-center mb-2">Create Post</h1>
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store') }}" enctype="multipart/form-data" id="dropdocument-form"
                        method="POST">
                        @csrf
                        <div class="w-1/2 mx-auto">
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" required
                            autocomplete="title" />

                        <x-label for="description" :value="__('Description')" class="mt-3" />
                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" required autocomplete="description" />
                        </div>
                        <div class="mt-3 text-center pb-3">
                            <button type="submit"
                                class="w-24 h-10 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-600">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
