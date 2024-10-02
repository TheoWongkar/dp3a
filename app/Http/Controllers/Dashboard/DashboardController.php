<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function post()
    {
        $posts = Post::paginate(5);
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 'Terbit')->count();
        $archivedPosts = Post::where('status', 'Arsip')->count();

        return view('dashboard', compact('totalPosts', 'publishedPosts', 'archivedPosts', 'posts'));
    }
}
