<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Flight
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Add New Flight
                </h3>

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-4 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('flights.store') }}" method="POST">
                    @csrf

                    {{-- Aircraft --}}
                    <div class="mb-4">
                        <label for="aircraft_id"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Aircraft
                        </label>

                        <select name="aircraft_id"
                            id="aircraft_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            <option value="">Select Aircraft</option>

                            @foreach ($aircraft as $item)
                                <option value="{{ $item->aircraft_id }}"
                                    {{ old('aircraft_id') == $item->aircraft_id ? 'selected' : '' }}>
                                    {{ $item->registration_number }} - {{ $item->model }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Flight Number --}}
                    <div class="mb-4">
                        <label for="flight_number"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Flight Number
                        </label>

                        <input type="text"
                            name="flight_number"
                            id="flight_number"
                            value="{{ old('flight_number') }}"
                            maxlength="20"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            placeholder="Example: GA204"
                            required>
                    </div>

                    {{-- Origin Airport --}}
                    <div class="mb-4">
                        <label for="origin_airport"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Origin Airport
                        </label>

                        <input type="text"
                            name="origin_airport"
                            id="origin_airport"
                            value="{{ old('origin_airport') }}"
                            maxlength="3"
                            class="w-full border-gray-300 rounded-lg shadow-sm uppercase"
                            placeholder="Example: CGK"
                            required>
                    </div>

                    {{-- Destination Airport --}}
                    <div class="mb-4">
                        <label for="destination_airport"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Destination Airport
                        </label>

                        <input type="text"
                            name="destination_airport"
                            id="destination_airport"
                            value="{{ old('destination_airport') }}"
                            maxlength="3"
                            class="w-full border-gray-300 rounded-lg shadow-sm uppercase"
                            placeholder="Example: DPS"
                            required>
                    </div>

                    {{-- Departure Time --}}
                    <div class="mb-4">
                        <label for="departure_time"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Departure Time
                        </label>

                        <input type="datetime-local"
                            name="departure_time"
                            id="departure_time"
                            value="{{ old('departure_time') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>
                    </div>

                    {{-- Arrival Time --}}
                    <div class="mb-4">
                        <label for="arrival_time"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Arrival Time
                        </label>

                        <input type="datetime-local"
                            name="arrival_time"
                            id="arrival_time"
                            value="{{ old('arrival_time') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>
                    </div>

                    {{-- Status --}}
                    <div class="mb-6">
                        <label for="status"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Status
                        </label>

                        <select name="status"
                            id="status"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            <option value="">Select Status</option>
                            <option value="Scheduled" {{ old('status') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="Boarding" {{ old('status') == 'Boarding' ? 'selected' : '' }}>Boarding</option>
                            <option value="Delayed" {{ old('status') == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                            <option value="Departed" {{ old('status') == 'Departed' ? 'selected' : '' }}>Departed</option>
                            <option value="Arrived" {{ old('status') == 'Arrived' ? 'selected' : '' }}>Arrived</option>
                            <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>

                        </select>
                    </div>

                    {{-- Action --}}
                    <div class="flex justify-end gap-2">

                        <a href="{{ route('flights.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Save Flight
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>