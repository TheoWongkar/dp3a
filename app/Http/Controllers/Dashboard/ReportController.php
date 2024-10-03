<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $reports = Report::with('latestStatus')->get();
        return view('dashboard.report.index', compact('reports'));
    }

    public function show(string $ticket_number)
    {
        $status = Status::where('ticket_number', $ticket_number)->firstOrFail();
    }
}
