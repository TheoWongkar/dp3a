<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::with('user')->where('status', 'Terbit')
            ->orderBy('created_at', 'desc')
            ->first();
        $posts = Post::with('user')->where('status', 'Terbit')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('home', compact('post', 'posts'));
    }
}
