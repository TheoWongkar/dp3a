<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Victim;
use App\Models\Perpetrator;
use App\Models\Reporter;
use App\Models\Status;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view('reports');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'violence_category' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'scene' => 'required|string',
            'evidence' => 'nullable|image|file|max:3072',
            'victim_name' => 'required|string',
            'victim_age' => 'required|integer',
            'victim_gender' => 'required|string',
            'victim_description' => 'nullable|string',
            'perpetrator_name' => 'nullable|string',
            'perpetrator_age' => 'nullable|integer',
            'relationship_between' => 'nullable|string',
            'perpetrator_description' => 'nullable|string',
            'reporter_whatsapp' => 'nullable|string',
            'reporter_telegram' => 'nullable|string',
            'reporter_instagram' => 'nullable|string',
            'reporter_email' => 'nullable|string',
        ]);

        $victim = Victim::create([
            'name' => $validated['victim_name'],
            'age' => $validated['victim_age'],
            'gender' => $validated['victim_gender'],
            'description' => $validated['victim_description'],
        ]);

        $perpetrator = Perpetrator::create([
            'name' => $validated['perpetrator_name'],
            'age' => $validated['perpetrator_age'],
            'relationship_between' => $validated['relationship_between'],
            'description' => $validated['perpetrator_description'],
        ]);

        $reporter = Reporter::create([
            'whatsapp' =>  $validated['reporter_whatsapp'],
            'telegram' => $validated['reporter_telegram'],
            'instagram' => $validated['reporter_instagram'],
            'email' => $validated['reporter_email'],
        ]);

        if ($request->file('evidence')) {
            $validated['evidence'] = $request->file('evidence')->store('evidence-images');
        }

        $ticket = Report::generateTicketNumber();
        $report = Report::create([
            'ticket_number' => $ticket,
            'victim_id' => $victim->id,
            'perpetrator_id' => $perpetrator->id,
            'reporter_id' => $reporter->id,
            'violence_category' => $validated['violence_category'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'scene' => $validated['scene'],
            'evidence' => $validated['evidence'],
        ]);

        $status = Status::create([
            'report_id' => $report->id,
        ]);

        return redirect()->route('reports')->with('success', 'Pengumuman berhasil dibuat.');
    }
}
