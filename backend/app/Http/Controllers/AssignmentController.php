<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Flight;
use App\Models\GroundStaff;
use App\Models\GroundHandlingService;

class AssignmentController extends Controller
{
    
    public function index()
    {
        $assignments = Assignment::with([
            'flight',
            'groundStaff',
            'service'
        ])
        ->orderBy('assignment_date')
        ->get();

        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $flights = Flight::orderBy('flight_number')->get();
        $staff = GroundStaff::orderBy('staff_name')->get();
        $services = GroundHandlingService::orderBy('service_name')->get();

        return view('assignments.create', compact(
            'flights',
            'staff',
            'services'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_id'       => 'required|exists:flights,flight_id',
            'staff_id'        => 'required|exists:ground_staff,staff_id',
            'service_id'      => 'required|exists:ground_handling_services,service_id',
            'assignment_date' => 'required|date',
            'status'          => 'required|in:Pending,In Progress,Completed,Cancelled',
        ]);

        Assignment::create($validated);

        return redirect()
            ->route('assignments.index')
            ->with('success', 'Assignment added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $assignment = Assignment::findOrFail($id);

        $flights = Flight::orderBy('flight_number')->get();
        $staff = GroundStaff::orderBy('staff_name')->get();
        $services = GroundHandlingService::orderBy('service_name')->get();

        return view('assignments.edit', compact(
            'assignment',
            'flights',
            'staff',
            'services'
        ));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'flight_id'       => 'required|exists:flights,flight_id',
            'staff_id'        => 'required|exists:ground_staff,staff_id',
            'service_id'      => 'required|exists:ground_handling_services,service_id',
            'assignment_date' => 'required|date',
            'status'          => 'required|in:Pending,In Progress,Completed,Cancelled',
        ]);

        $assignment = Assignment::findOrFail($id);

        $assignment->update($validated);

        return redirect()
            ->route('assignments.index')
            ->with('success', 'Assignment updated successfully.');
    }

    public function destroy(string $id)
    {
        $assignment = Assignment::findOrFail($id);

        $assignment->delete();

        return redirect()
            ->route('assignments.index')
            ->with('success', 'Assignment deleted successfully.');
    }
}
