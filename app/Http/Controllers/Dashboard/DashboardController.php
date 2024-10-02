<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {
        $postData = $this->getPostsData();
        $announcementData = $this->getAnnouncementsData();
        $data = array_merge($postData, $announcementData);

        return view('dashboard', $data);
    }

    private function getPostsData()
    {
        $posts = Post::with('user')->paginate(5);
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 'Terbit')->count();
        $archivedPosts = Post::where('status', 'Arsip')->count();

        return compact('totalPosts', 'publishedPosts', 'archivedPosts', 'posts');
    }

    private function getAnnouncementsData()
    {
        $announcements = Announcement::with('user')->paginate(5);
        $totalAnnouncements = Announcement::count();
        $publishedAnnouncements = Announcement::where('status', 'Terbit')->count();
        $archivedAnnouncements = Announcement::where('status', 'Arsip')->count();

        return compact('totalAnnouncements', 'publishedAnnouncements', 'archivedAnnouncements', 'announcements');
    }
}
