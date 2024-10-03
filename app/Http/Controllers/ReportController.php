<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view('reports');
    }

    public function store(Request $request)
    {
        dd($request);

        return redirect()->view('reports')->with('success', 'Pengumuman berhasil dibuat.');
    }
}
