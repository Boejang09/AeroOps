<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Airlines
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
                            Airline List
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Manage airline master data.
                        </p>
                    </div>

                    <a href="{{ route('airlines.create') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        Add Airline
                    </a>

                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full border border-gray-300">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-3 text-center">
                                    No
                                </th>

                                <th class="border px-4 py-3 text-center">
                                    Code
                                </th>

                                <th class="border px-4 py-3">
                                    Airline Name
                                </th>

                                <th class="border px-4 py-3">
                                    Country
                                </th>

                                <th class="border px-4 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($airlines as $airline)

                                <tr class="hover:bg-gray-50">

                                    {{-- Number --}}
                                    <td class="border px-4 py-3 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    {{-- Airline Code --}}
                                    <td class="border px-4 py-3 text-center">
                                        {{ $airline->airline_code }}
                                    </td>

                                    {{-- Airline Name --}}
                                    <td class="border px-4 py-3">
                                        {{ $airline->airline_name }}
                                    </td>

                                    {{-- Country --}}
                                    <td class="border px-4 py-3">
                                        {{ $airline->country }}
                                    </td>

                                    {{-- Actions --}}
                                    <td class="border px-4 py-3 text-center">

                                        {{-- Edit --}}
                                        <a href="{{ route('airlines.edit', $airline->airline_id) }}"
                                           class="inline-block px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('airlines.destroy', $airline->airline_id) }}"
                                            method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this airline?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5"
                                        class="border px-4 py-6 text-center text-gray-500">
                                        No airline data available.
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