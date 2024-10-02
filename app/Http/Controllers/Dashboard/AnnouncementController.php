<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $announcements = Announcement::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "{$search}%"); // Ganti 'name' dengan kolom yang ingin dicari dari tabel users
                    });
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status); // Menambahkan filter berdasarkan status
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.announcement.index', [
            'posts' => $announcements,
            'search' => $search,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:5|',
            'image' => 'required|image|file|max:3072',
            'body' => 'required|string',
            'status' => 'required|string',
        ]);

        $validated['image'] = $request->file('image')->store('announcement-images');
        $validated['user_id'] = Auth::id();


        Announcement::create($validated);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();

        if (!$announcement) {
            return view('dashboard.announcement.index')
                ->with('error', 'Berita tidak ditemukan');
        }

        return view('dashboard.announcement.show', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();
        return view('dashboard.announcement.edit', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|min:5|',
            'image' => 'nullable|image|file|max:3072',
            'body' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('announcement-images');
        }

        $announcement->update($validated);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $announcement = Announcement::where('slug', $slug);
        $announcement->delete();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
