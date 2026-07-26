<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Airline
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('airlines.update', $airline->airline_id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Airline Code
                        </label>

                        <input
                            type="text"
                            name="airline_code"
                            value="{{ old('airline_code', $airline->airline_code) }}"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Airline Name
                        </label>

                        <input
                            type="text"
                            name="airline_name"
                            value="{{ old('airline_name', $airline->airline_name) }}"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-2">
                            Country
                        </label>

                        <input
                            type="text"
                            name="country"
                            value="{{ old('country', $airline->country) }}"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <button
                        type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded">

                        Update Airline

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>