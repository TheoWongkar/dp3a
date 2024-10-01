<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
