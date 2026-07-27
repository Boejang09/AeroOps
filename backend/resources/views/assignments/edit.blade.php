<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Assignment
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Edit Assignment
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

                <form action="{{ route('assignments.update', $assignment->assignment_id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Flight --}}
                    <div class="mb-4">
                        <label for="flight_id"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Flight
                        </label>

                        <select name="flight_id" id="flight_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            @foreach ($flights as $flight)
                                <option value="{{ $flight->flight_id }}"
                                    {{ old('flight_id', $assignment->flight_id) == $flight->flight_id ? 'selected' : '' }}>

                                    {{ $flight->flight_number }}
                                    ({{ $flight->origin_airport }} → {{ $flight->destination_airport }})

                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Ground Staff --}}
                    <div class="mb-4">
                        <label for="staff_id"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Ground Staff
                        </label>

                        <select name="staff_id" id="staff_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            @foreach ($staff as $item)
                                <option value="{{ $item->staff_id }}"
                                    {{ old('staff_id', $assignment->staff_id) == $item->staff_id ? 'selected' : '' }}>

                                    {{ $item->staff_name }} - {{ $item->position }}

                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Service --}}
                    <div class="mb-4">
                        <label for="service_id"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Ground Handling Service
                        </label>

                        <select name="service_id" id="service_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            @foreach ($services as $service)
                                <option value="{{ $service->service_id }}"
                                    {{ old('service_id', $assignment->service_id) == $service->service_id ? 'selected' : '' }}>

                                    {{ $service->service_name }}

                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Assignment Date --}}
                    <div class="mb-4">
                        <label for="assignment_date"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Assignment Date
                        </label>

                        <input type="date"
                            name="assignment_date"
                            id="assignment_date"
                            value="{{ old('assignment_date', $assignment->assignment_date) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>
                    </div>

                    {{-- Status --}}
                    <div class="mb-6">
                        <label for="status"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Status
                        </label>

                        <select name="status" id="status"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            @foreach (['Pending', 'In Progress', 'Completed', 'Cancelled'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $assignment->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="flex justify-end gap-2">

                        <a href="{{ route('assignments.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Update Assignment
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>