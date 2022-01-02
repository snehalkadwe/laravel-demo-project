<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VideoUploadRequest;
use App\Models\UploadVideo;
use Illuminate\Support\Facades\Response;
// use Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// -> File::delete('file');
// use File;
// use Response;

class UploadVideoController extends Controller
{
     public function index()
    {
        $videos = UploadVideo::all();
        return view('upload-video', ['videos' => $videos]);
        // return view('upload-video');
    }

    public function store(VideoUploadRequest $request)
    {
        $documentFile = $request->file('video');
        $ext = $documentFile->getClientOriginalExtension();
        $filenameWithExt = $documentFile->getClientOriginalName();
        $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = 'ex-'.$fileName. '_'.time().'.'.$ext;
        $documentFile->getRealPath();
        $path = $documentFile->storeAs('public/videos', $fileNameToStore);

        $uploadVideo = UploadVideo::create([
            'filename' => $fileNameToStore,
            'path' => $path,
            'size' => $documentFile->getSize(),
            'type' => $documentFile->getMimeType(),
        ]);

        return redirect()->back()->with('success', 'Video uploaded');
    }

    // get single video
    public function getVideo(UploadVideo $video)
    {
        $name = $video->path;
        $fileContents = Storage::disk('local')->get($name);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

    public function edit(UploadVideo $video)
    {
        return view('upload-video-edit', compact('video', $video));
    }
    public function update(Request $request, UploadVideo $video)
    {
        $documentFile = $request->file('video');
        $ext = $documentFile->getClientOriginalExtension();
        $filenameWithExt = $documentFile->getClientOriginalName();
        $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = 'ex-'.$fileName. '_'.time().'.'.$ext;
        $documentFile->getRealPath();
        $path = $documentFile->storeAs('public/videos', $fileNameToStore);

        $uploadVideo = [
            'filename' => $fileNameToStore,
            'path' => $path,
            'size' => $documentFile->getSize(),
            'type' => $documentFile->getMimeType(),
        ];

        if (Storage::exists($video->path)) {
            Storage::delete($video->path);
        }

        UploadVideo::where('id', $video->id)->update($uploadVideo);

        return redirect()->back()->with('success', 'Video updated');
    }

    public function destroy(UploadVideo $video)
    {
        // method 1 to delete from folder storage n public
        // $path = public_path('storage').'/videos/'.$video->filename;
        // if (File::exists($path)) {
        //     File::delete($path);
        // } else {
        //     dd('File does not exists.' .$path);
        // }

        // method 2
        if (Storage::exists($video->path)) {
            Storage::delete($video->path);
        /*
            Delete Multiple File like this way
            Storage::delete(['upload/test.png', 'upload/test2.png']);
        */
        } else {
            dd('File does not exists.');
        }
        $video->delete();
        // $path = public_path('storage').'/videos/'.$video->filename;
        // $path = storage_path('app/public/').$video->filename;

        return redirect()->back()->with('success', 'File deleted');
    }
}
