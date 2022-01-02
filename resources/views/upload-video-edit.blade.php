<x-app-layout>
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

            <div class="mx-3 border ring ring-gray-400">
                <a href="{{ route('upload-video.getVideo', $video->id) }}">
                    <video width="220" height="240" controls>
                        <source src="{{ Storage::url($video->path) }}" type="{{ $video->type }}">
                        Your browser does not support the video tag.
                    </video>
                </a>
            </div>
        </div>
        <form action="{{ route('upload-video.update', $video) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <label class="ml-2" for="file">Upload File</label>
            <input type="file" name="video" class=" p-2 m-4">
            <button type="submit" class="border border-indigo-700 bg-indigo-500 text-white px-3 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
