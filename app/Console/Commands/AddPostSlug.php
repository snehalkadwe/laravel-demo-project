<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Str;

class AddPostSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:createSulg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update post slug';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::all();
        $posts->each(function ($post) {
            if ($post->id != 7) {
                $post->update(['slug' => Str::slug($post->title)]);
            }
        });
    }
}
