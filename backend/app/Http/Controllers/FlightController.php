<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Aircraft;
use Illuminate\Validation\Rule;

class FlightController extends Controller
{
   
    public function index()
    {
        $flights = Flight::with('aircraft')
            ->orderBy('departure_time')
            ->get();

        return view('flights.index', compact('flights'));
    }

    
    public function create()
    {
        $aircraft = Aircraft::orderBy('registration_number')->get();

        return view('flights.create', compact('aircraft'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aircraft_id'         => 'required|exists:aircraft,aircraft_id',
            'flight_number'       => 'required|max:20|unique:flights,flight_number',
            'origin_airport'      => 'required|size:3',
            'destination_airport' => 'required|size:3|different:origin_airport',
            'departure_time'      => 'required|date',
            'arrival_time'        => 'required|date|after:departure_time',
            'status'              => 'required|in:Scheduled,Boarding,Delayed,Departed,Arrived,Cancelled',
        ]);

        Flight::create($validated);

        return redirect()
            ->route('flights.index')
            ->with('success', 'Flight added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $flight = Flight::findOrFail($id);

        $aircraft = Aircraft::orderBy('registration_number')->get();

        return view('flights.edit', compact('flight', 'aircraft'));
    }

    public function update(Request $request, string $id)
    {
        $flight = Flight::findOrFail($id);

        $validated = $request->validate([
            'aircraft_id'         => 'required|exists:aircraft,aircraft_id',
            'flight_number'       => [
                'required',
                'max:20',
                Rule::unique('flights', 'flight_number')->ignore($flight->flight_id, 'flight_id'),
            ],
            'origin_airport'      => 'required|size:3',
            'destination_airport' => 'required|size:3|different:origin_airport',
            'departure_time'      => 'required|date',
            'arrival_time'        => 'required|date|after:departure_time',
            'status'              => 'required|in:Scheduled,Boarding,Delayed,Departed,Arrived,Cancelled',
        ]);

        $flight->update($validated);

        return redirect()
            ->route('flights.index')
            ->with('success', 'Flight updated successfully.');
    }

    public function destroy(string $id)
    {
        $flight = Flight::findOrFail($id);

        $flight->delete();

        return redirect()
            ->route('flights.index')
            ->with('success', 'Flight deleted successfully.');
    }
}
