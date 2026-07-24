<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Airlines
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

                   <a href="{{ route('airlines.create') }}" class="underline text-blue-600">
                    Add Airline
                   </a>

                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full border border-gray-300">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="border px-4 py-3 text-center w-16">
                                    No
                                </th>

                                <th class="border px-4 py-3 text-center w-24">
                                    Code
                                </th>

                                <th class="border px-4 py-3">
                                    Airline Name
                                </th>

                                <th class="border px-4 py-3">
                                    Country
                                </th>

                                <th class="border px-4 py-3 text-center w-48">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($airlines as $airline)

                                <tr class="hover:bg-gray-50">

                                    <td class="border px-4 py-3 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="border px-4 py-3 text-center font-medium">
                                        {{ $airline->airline_code }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $airline->airline_name }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $airline->country }}
                                    </td>

                                    <td class="border px-4 py-3 text-center">

                                        <a href="#"
                                           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-1 rounded mr-2">
                                            Edit
                                        </a>

                                        <a href="#"
                                           class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded">
                                            Delete
                                        </a>

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