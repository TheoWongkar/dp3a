<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $posts = Post::with('user')
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

        return view('dashboard.post.index', [
            'posts' => $posts,
            'search' => $search,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create');
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

        $validated['image'] = $request->file('image')->store('post-images');
        $validated['user_id'] = Auth::id();


        Post::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
