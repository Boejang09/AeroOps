<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\GroundStaff;
use App\Models\Assignment;
use App\Models\GroundHandlingService;
use App\Models\OperationalReport;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFlights = Flight::count();

        $totalGroundStaff = GroundStaff::count();

        $activeAssignments = Assignment::whereIn('status', [
            'Pending',
            'In Progress'
        ])->count();

        $totalServices = GroundHandlingService::count();

        $totalReports = OperationalReport::count();

        $recentFlights = Flight::with('aircraft')
            ->orderByDesc('departure_time')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalFlights',
            'totalGroundStaff',
            'activeAssignments',
            'totalServices',
            'totalReports',
            'recentFlights'
        ));
    }
}