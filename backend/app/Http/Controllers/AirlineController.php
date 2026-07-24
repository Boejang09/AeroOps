<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::orderBy('airline_name')->get();

        return view('airlines.index', compact('airlines'));
    }

    public function create()
    {
        return view('airlines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'airline_code' => 'required|max:10|unique:airlines,airline_code',
            'airline_name' => 'required|max:100',
            'country'      => 'required|max:100',
        ]);
        
        Airline::create([
            'airline_code' => $request->airline_code,
            'airline_name' => $request->airline_name,
            'country'      => $request->country,
        ]);

    return redirect()
        ->route('airlines.index')
        ->with('success', 'Airline added successfully.');
    }

    public function show(Airline $airline)
    {
        //
    }

    public function edit(Airline $airline)
    {
        //
    }

    public function update(Request $request, Airline $airline)
    {
        //
    }

    public function destroy(Airline $airline)
    {
        //
    }
}