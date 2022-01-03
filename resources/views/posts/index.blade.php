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
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" required
                                autocomplete="description" />

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
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Id
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Slug
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $post->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $post->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $post->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $post->slug }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
