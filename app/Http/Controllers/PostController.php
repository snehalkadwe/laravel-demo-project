<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\PostCreated;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        PostCreated::dispatch($post);
        return redirect()->back()->with('success', 'Post created successfully');
    }
}
