<?php

namespace App\Http\Controllers;

use App\Models\GroundStaff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroundStaffController extends Controller
{
    public function index()
    {
        $groundStaff = GroundStaff::orderBy('staff_name')->get();

        return view('ground-staff.index', compact('groundStaff'));
    }

    public function create()
    {
        return view('ground-staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_name' => 'required|string|max:100',
            'position'   => 'required|string|max:100',
            'phone'      => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100|unique:ground_staff,email',
        ]);

        GroundStaff::create($validated);

        return redirect()
            ->route('ground-staff.index')
            ->with('success', 'Ground staff added successfully.');
    }

    public function show(GroundStaff $groundStaff)
    {
        //
    }

    public function edit(GroundStaff $groundStaff)
    {
        return view('ground-staff.edit', compact('groundStaff'));
    }

    public function update(Request $request, GroundStaff $groundStaff)
    {
        $validated = $request->validate([
            'staff_name' => 'required|string|max:100',
            'position'   => 'required|string|max:100',
            'phone'      => 'nullable|string|max:20',

            'email' => [
                'nullable',
                'email',
                'max:100',
                Rule::unique('ground_staff', 'email')
                    ->ignore($groundStaff->staff_id, 'staff_id'),
            ],
        ]);

        $groundStaff->update($validated);

        return redirect()
            ->route('ground-staff.index')
            ->with('success', 'Ground staff updated successfully.');
    }

    public function destroy(GroundStaff $groundStaff)
    {
        $groundStaff->delete();

        return redirect()
            ->route('ground-staff.index')
            ->with('success', 'Ground staff deleted successfully.');
    }
}