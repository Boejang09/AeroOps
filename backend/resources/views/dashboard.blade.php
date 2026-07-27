<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">
                Dashboard
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Overview of AeroOps ground handling operations.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome --}}
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-900">
                    Welcome back, {{ Auth::user()->name }}
                </h1>

                <p class="mt-1 text-slate-500">
                    Here's what's happening with airport operations.
                </p>
            </div>


            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

                {{-- Flights --}}
                <a href="{{ route('flights.index') }}"
                   class="group bg-white border border-slate-200 rounded-2xl p-6
                          shadow-sm hover:shadow-md hover:-translate-y-0.5
                          transition duration-200">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Total Flights
                            </p>

                            <p class="mt-3 text-3xl font-bold text-slate-900">
                                {{ $totalFlights }}
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-xl bg-blue-50
                                    flex items-center justify-center text-blue-600">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 19V5m0 0L7 10m5-5 5 5M5 19h14"/>
                            </svg>

                        </div>

                    </div>

                    <p class="mt-5 text-xs text-slate-400 group-hover:text-blue-600">
                        View flight operations →
                    </p>

                </a>


                {{-- Ground Staff --}}
                <a href="{{ route('ground-staff.index') }}"
                   class="group bg-white border border-slate-200 rounded-2xl p-6
                          shadow-sm hover:shadow-md hover:-translate-y-0.5
                          transition duration-200">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Ground Staff
                            </p>

                            <p class="mt-3 text-3xl font-bold text-slate-900">
                                {{ $totalGroundStaff }}
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-xl bg-emerald-50
                                    flex items-center justify-center text-emerald-600">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m6-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>

                        </div>

                    </div>

                    <p class="mt-5 text-xs text-slate-400 group-hover:text-emerald-600">
                        Manage ground staff →
                    </p>

                </a>


                {{-- Assignments --}}
                <a href="{{ route('assignments.index') }}"
                   class="group bg-white border border-slate-200 rounded-2xl p-6
                          shadow-sm hover:shadow-md hover:-translate-y-0.5
                          transition duration-200">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Active Assignments
                            </p>

                            <p class="mt-3 text-3xl font-bold text-slate-900">
                                {{ $activeAssignments }}
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-xl bg-amber-50
                                    flex items-center justify-center text-amber-600">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 12l2 2 4-4"/>
                            </svg>

                        </div>

                    </div>

                    <p class="mt-5 text-xs text-slate-400 group-hover:text-amber-600">
                        View assignments →
                    </p>

                </a>


                {{-- Services --}}
                <a href="{{ route('ground-handling-services.index') }}"
                   class="group bg-white border border-slate-200 rounded-2xl p-6
                          shadow-sm hover:shadow-md hover:-translate-y-0.5
                          transition duration-200">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm font-medium text-slate-500">
                                Services
                            </p>

                            <p class="mt-3 text-3xl font-bold text-slate-900">
                                {{ $totalServices }}
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-xl bg-violet-50
                                    flex items-center justify-center text-violet-600">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 6V4m0 16v-2M6 12H4m16 0h-2M7.76 7.76 6.34 6.34m11.32 11.32-1.42-1.42m0-8.48 1.42-1.42M7.76 16.24l-1.42 1.42M12 16a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>

                        </div>

                    </div>

                    <p class="mt-5 text-xs text-slate-400 group-hover:text-violet-600">
                        Manage services →
                    </p>

                </a>

            </div>


            {{-- Bottom Section --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8">

                {{-- Recent Flights --}}
                <div class="xl:col-span-2 bg-white border border-slate-200
                            rounded-2xl shadow-sm">

                    <div class="flex items-center justify-between px-6 py-5
                                border-b border-slate-100">

                        <div>
                            <h3 class="font-semibold text-slate-900">
                                Recent Flights
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                Latest flight operations.
                            </p>
                        </div>

                        <a href="{{ route('flights.index') }}"
                           class="text-sm font-medium text-blue-600 hover:text-blue-700">
                            View all
                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead class="bg-slate-50 text-xs uppercase
                                          tracking-wider text-slate-500">

                                <tr>
                                    <th class="px-6 py-3 text-left">
                                        Flight
                                    </th>

                                    <th class="px-6 py-3 text-left">
                                        Aircraft
                                    </th>

                                    <th class="px-6 py-3 text-left">
                                        Route
                                    </th>

                                    <th class="px-6 py-3 text-left">
                                        Status
                                    </th>
                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @forelse ($recentFlights as $flight)

                                    <tr class="hover:bg-slate-50 transition">

                                        <td class="px-6 py-4 font-semibold text-slate-900">
                                            {{ $flight->flight_number }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $flight->aircraft->registration_number ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            {{ $flight->origin_airport }}
                                            →
                                            {{ $flight->destination_airport }}
                                        </td>

                                        <td class="px-6 py-4">

                                            @php
                                                $statusClasses = match($flight->status) {
                                                    'Scheduled' => 'bg-blue-50 text-blue-700',
                                                    'Boarding'  => 'bg-amber-50 text-amber-700',
                                                    'Delayed'   => 'bg-red-50 text-red-700',
                                                    'Departed'  => 'bg-violet-50 text-violet-700',
                                                    'Arrived'   => 'bg-emerald-50 text-emerald-700',
                                                    'Cancelled' => 'bg-slate-100 text-slate-600',
                                                    default     => 'bg-slate-100 text-slate-600',
                                                };
                                            @endphp

                                            <span class="inline-flex px-2.5 py-1 rounded-full
                                                         text-xs font-semibold {{ $statusClasses }}">
                                                {{ $flight->status }}
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-10 text-center text-slate-500">
                                            No flight data available.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- Operational Summary --}}
                <div class="bg-slate-950 rounded-2xl p-6 shadow-sm text-white">

                    <p class="text-sm font-medium text-blue-300">
                        AeroOps
                    </p>

                    <h3 class="mt-2 text-xl font-bold">
                        Operational Overview
                    </h3>

                    <p class="mt-2 text-sm text-slate-400">
                        Monitor ground handling activities from one operational workspace.
                    </p>

                    <div class="mt-8">

                        <div class="flex items-center justify-between py-4
                                    border-b border-slate-800">

                            <span class="text-sm text-slate-400">
                                Flights
                            </span>

                            <span class="font-semibold">
                                {{ $totalFlights }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between py-4
                                    border-b border-slate-800">

                            <span class="text-sm text-slate-400">
                                Active Assignments
                            </span>

                            <span class="font-semibold">
                                {{ $activeAssignments }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between py-4
                                    border-b border-slate-800">

                            <span class="text-sm text-slate-400">
                                Reports
                            </span>

                            <span class="font-semibold">
                                {{ $totalReports }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between pt-4">

                            <span class="text-sm text-slate-400">
                                Services
                            </span>

                            <span class="font-semibold">
                                {{ $totalServices }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>