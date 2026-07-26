<?php

namespace App\Http\Controllers;

use App\Models\GroundHandlingService;
use Illuminate\Http\Request;

class GroundHandlingServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = GroundHandlingService::orderBy('service_name')->get();

        return view('ground-handling-services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('ground-handling-services.create');
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|max:100',
            'description'  => 'nullable',
        ]);

        GroundHandlingService::create($validated);

        return redirect()
            ->route('ground-handling-services.index')
            ->with('success', 'Ground handling service added successfully.');
    }

    /**
     * Display the specified service.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(string $id)
    {
        $groundHandlingService = GroundHandlingService::findOrFail($id);

        return view(
            'ground-handling-services.edit',
            compact('groundHandlingService')
        );
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'service_name' => 'required|max:100',
            'description'  => 'nullable',
        ]);

        $groundHandlingService = GroundHandlingService::findOrFail($id);

        $groundHandlingService->update($validated);

        return redirect()
            ->route('ground-handling-services.index')
            ->with('success', 'Ground handling service updated successfully.');
    }

    /**
     * Remove the specified service.
     */
    public function destroy(string $id)
    {
        $groundHandlingService = GroundHandlingService::findOrFail($id);
        
        $groundHandlingService->delete();

        return redirect()
            ->route('ground-handling-services.index')
            ->with('success', 'Ground handling service deleted successfully.');
    }
}