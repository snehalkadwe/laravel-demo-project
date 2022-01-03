<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\PostCreated;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title, '-'),
        ];
        $post = Post::create($data);
        PostCreated::dispatch($post);
        return redirect()->back()->with('success', 'Post created successfully');
    }
}
