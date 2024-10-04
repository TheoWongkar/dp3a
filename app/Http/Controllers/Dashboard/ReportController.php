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
        $reports = Report::with('latestStatus')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.report.index', compact('reports'));
    }

    public function edit(string $ticket_number)
    {
        $report = Report::with('status')->where('ticket_number', $ticket_number)->firstOrFail();

        return view('dashboard.report.edit', [
            'report' => $report,
        ]);
    }
}
