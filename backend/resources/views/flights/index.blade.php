<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Flight Management
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">
                            Flight List
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Manage airport flight operations.
                        </p>
                    </div>

                    <a href="{{ route('flights.create') }}"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        Add Flight
                    </a>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-3 text-center">No</th>
                                <th class="border px-4 py-3">Flight Number</th>
                                <th class="border px-4 py-3">Aircraft</th>
                                <th class="border px-4 py-3">Route</th>
                                <th class="border px-4 py-3">Departure</th>
                                <th class="border px-4 py-3">Arrival</th>
                                <th class="border px-4 py-3 text-center">Status</th>
                                <th class="border px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($flights as $flight)

                                <tr class="hover:bg-gray-50">

                                    <td class="border px-4 py-3 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $flight->flight_number }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $flight->aircraft->registration_number ?? '-' }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $flight->origin_airport }}
                                        →
                                        {{ $flight->destination_airport }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $flight->departure_time }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $flight->arrival_time }}
                                    </td>

                                    <td class="border px-4 py-3 text-center">
                                        {{ $flight->status }}
                                    </td>

                                    <td class="border px-4 py-3 text-center">
                                        <div class="flex justify-center items-center gap-2">

                                            <a href="{{ route('flights.edit', $flight->flight_id) }}"
                                                class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Edit
                                            </a>

                                            <form action="{{ route('flights.destroy', $flight->flight_id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this flight?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Delete
                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8"
                                        class="border px-4 py-6 text-center text-gray-500">
                                        No flight data available.
                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>