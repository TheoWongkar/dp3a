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
        $search = $request->get('search');
        $status = $request->get('status');

        $reports = Report::with('latestStatus')
            ->when($search, function ($query, $search) {
                return $query->where('ticket_number', 'LIKE', "%{$search}%")
                    ->orWhere('violence_category', 'LIKE', "%{$search}%")
                    ->orWhereHas('latestStatus', function ($query) use ($search) {
                        $query->where('status', 'LIKE', "{$search}%");
                    });
            })
            ->when($status, function ($query) use ($status) {
                return $query->whereHas('latestStatus', function ($query) use ($status) {
                    $query->where('status', $status);
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.report.index', [
            'reports' => $reports,
            'search' => $search,
            'status' => $status,
        ]);
    }

    public function edit(string $ticket_number)
    {
        $report = Report::with('status')->where('ticket_number', $ticket_number)->firstOrFail();

        return view('dashboard.report.edit', [
            'report' => $report,
        ]);
    }
}
