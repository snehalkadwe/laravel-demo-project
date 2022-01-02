<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
        <x-success>
            {{ session()->get('success') }}
        </x-success>
    @endif
    @if (Session::has('errors'))
        <x-error>
            {{ session()->get('errors') }}
        </x-error>
    @endif
    <div class="container my-4 mx-auto">
        <div class="flex w-full">
            {{-- {{! empty($videos) }} --}}
            @if ($videos)
                @foreach ($videos as $video)
                    <div class="mx-3 border ring ring-gray-400">
                        <a href="{{ route('upload-video.getVideo', $video->id) }}">
                            <video width="220" height="240" controls>
                                <source src="{{ Storage::url($video->path) }}" type="{{ $video->type }}">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    </div>
                    <div>
                        <span>
                            <a href="{{ route('upload-video.edit', $video->id) }}" type="button" class="border px-4 border-indigo-600 m-1 text-indigo-800 border rounded">Edit</a>
                        </span>
                        <span>
                            <a href="{{ route('upload-video.destroy', $video->id) }}" type="button" class="border px-4 border-red-600 m-1 text-red-800 border rounded">Delete</a>
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
        <form action="{{ route('upload-video.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <label class="ml-2" for="file">Upload File</label>
            <input type="file" name="video" class=" p-2 m-4">
            <button type="submit" class="border border-indigo-700 bg-indigo-500 text-white px-3 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
