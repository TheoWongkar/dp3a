<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->where('status', 'Terbit')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $announcements = Announcement::with('user')->where('status', 'Terbit')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('posts', compact('posts', 'announcements'));
    }

    public function showPost()
    {
        return view('post');
    }
}
