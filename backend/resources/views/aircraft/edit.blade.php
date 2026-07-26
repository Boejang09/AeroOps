<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Aircraft
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('aircraft.update', $aircraft->aircraft_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Airline --}}
                    <div class="mb-4">
                        <label for="airline_id" class="block font-medium mb-2">
                            Airline
                        </label>

                        <select
                            id="airline_id"
                            name="airline_id"
                            class="w-full border rounded-lg p-2"
                            required
                        >
                            <option value="">Select Airline</option>

                            @foreach ($airlines as $airline)
                                <option
                                    value="{{ $airline->airline_id }}"
                                    {{ old('airline_id', $aircraft->airline_id) == $airline->airline_id ? 'selected' : '' }}
                                >
                                    {{ $airline->airline_code }} - {{ $airline->airline_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Registration Number --}}
                    <div class="mb-4">
                        <label for="registration_number" class="block font-medium mb-2">
                            Registration Number
                        </label>

                        <input
                            type="text"
                            id="registration_number"
                            name="registration_number"
                            value="{{ old('registration_number', $aircraft->registration_number) }}"
                            class="w-full border rounded-lg p-2"
                            required
                        >
                    </div>

                    {{-- Manufacturer --}}
                    <div class="mb-4">
                        <label for="manufacturer" class="block font-medium mb-2">
                            Manufacturer
                        </label>

                        <input
                            type="text"
                            id="manufacturer"
                            name="manufacturer"
                            value="{{ old('manufacturer', $aircraft->manufacturer) }}"
                            class="w-full border rounded-lg p-2"
                            required
                        >
                    </div>

                    {{-- Model --}}
                    <div class="mb-4">
                        <label for="model" class="block font-medium mb-2">
                            Model
                        </label>

                        <input
                            type="text"
                            id="model"
                            name="model"
                            value="{{ old('model', $aircraft->model) }}"
                            class="w-full border rounded-lg p-2"
                            required
                        >
                    </div>

                    {{-- Capacity --}}
                    <div class="mb-6">
                        <label for="capacity" class="block font-medium mb-2">
                            Capacity
                        </label>

                        <input
                            type="number"
                            id="capacity"
                            name="capacity"
                            value="{{ old('capacity', $aircraft->capacity) }}"
                            class="w-full border rounded-lg p-2"
                            min="1"
                            required
                        >
                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                        >
                            Update Aircraft
                        </button>

                        <a
                            href="{{ route('aircraft.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>