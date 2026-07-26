<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Airline;
use Illuminate\Http\Request;

class AircraftController extends Controller
{
   
    public function index()
    {
        $aircraft = Aircraft::with('airline')
            ->orderBy('registration_number')
            ->get();

        return view('aircraft.index', compact('aircraft'));
    }

    public function create()
    {
        $airlines = Airline::orderBy('airline_name')->get();

        return view('aircraft.create', compact('airlines'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'airline_id'          => 'required|exists:airlines,airline_id',
        'registration_number' => 'required|max:20|unique:aircraft,registration_number',
        'manufacturer'        => 'required|max:100',
        'model'               => 'required|max:100',
        'capacity'            => 'required|integer|min:1',
        ]);

        Aircraft::create([
            'airline_id'          => $request->airline_id,
            'registration_number' => $request->registration_number,
            'manufacturer'        => $request->manufacturer,
            'model'               => $request->model,
            'capacity'            => $request->capacity,
        ]);

        return redirect()
            ->route('aircraft.index')
            ->with('success', 'Aircraft added successfully.');
    }

    public function show(Aircraft $aircraft)
    {
        //
    }

    public function edit(Aircraft $aircraft)
    {
        $airlines = Airline::orderBy('airline_name')->get();

        return view('aircraft.edit', compact('aircraft', 'airlines'));
    }

    public function update(Request $request, Aircraft $aircraft)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,airline_id',
            'registration_number' => 'required|max:20|unique:aircraft,registration_number,' 
                . $aircraft->aircraft_id . ',aircraft_id',
            'manufacturer' => 'required|max:100',
            'model' => 'required|max:100',
            'capacity' => 'required|integer|min:1',
        ]);

        $aircraft->update([
            'airline_id' => $request->airline_id,
            'registration_number' => $request->registration_number,
            'manufacturer' => $request->manufacturer,
            'model' => $request->model,
            'capacity' => $request->capacity,
        ]);

        return redirect()
            ->route('aircraft.index')
            ->with('success', 'Aircraft updated successfully.');
    }

    public function destroy(Aircraft $aircraft)
    {
        $aircraft->delete();

        return redirect()
            ->route('aircraft.index')
            ->with('success', 'Aircraft deleted successfully.');
    }
}