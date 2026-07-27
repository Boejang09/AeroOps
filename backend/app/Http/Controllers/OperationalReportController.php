<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OperationalReport;
use App\Models\Assignment;

class OperationalReportController extends Controller
{

    public function index()
    {
        $reports = OperationalReport::with([
            'assignment.flight',
            'assignment.groundStaff',
            'assignment.service'
        ])
        ->orderBy('report_date')
        ->get();

        return view('operational-reports.index', compact('reports'));
    }

    public function create()
    {
        $assignments = Assignment::with([
            'flight',
            'groundStaff',
            'service'
        ])
        ->whereDoesntHave('operationalReport')
        ->orderBy('assignment_date')
        ->get();

        return view('operational-reports.create', compact('assignments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'assignment_id' => 'required|exists:assignments,assignment_id',
            'report_date'   => 'required|date',
            'description'   => 'nullable',
            'status'        => 'required|in:Draft,Submitted,Approved,Rejected',
        ]);

        OperationalReport::create($validated);

        return redirect()
            ->route('operational-reports.index')
            ->with('success', 'Operational report added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $report = OperationalReport::findOrFail($id);

        $assignments = Assignment::with([
            'flight',
            'groundStaff',
            'service'
        ])
        ->where(function ($query) use ($report) {
            $query->whereDoesntHave('operationalReport')
                ->orWhere('assignment_id', $report->assignment_id);
        })
        ->orderBy('assignment_date')
        ->get();

        return view('operational-reports.edit', compact(
            'report',
            'assignments'
        ));
    }

    public function update(Request $request, string $id)
    {
        $report = OperationalReport::findOrFail($id);

        $validated = $request->validate([
            'assignment_id' => [
                'required',
                'exists:assignments,assignment_id',
                'unique:operational_reports,assignment_id,' . $report->report_id . ',report_id',
            ],
            'report_date' => 'required|date',
            'description' => 'nullable',
            'status'      => 'required|in:Draft,Submitted,Approved,Rejected',
        ]);

        $report->update($validated);

        return redirect()
            ->route('operational-reports.index')
            ->with('success', 'Operational report updated successfully.');
    }

    public function destroy(string $id)
    {
        $report = OperationalReport::findOrFail($id);

        $report->delete();

        return redirect()
            ->route('operational-reports.index')
            ->with('success', 'Operational report deleted successfully.');
    }
}
