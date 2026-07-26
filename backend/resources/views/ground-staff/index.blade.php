<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ground Staff
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
                            Ground Staff List
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Manage airport ground staff data.
                        </p>
                    </div>

                    <a href="{{ route('ground-staff.create') }}"
                       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        Add Staff
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

                                <th class="border px-4 py-3">
                                    Staff Name
                                </th>

                                <th class="border px-4 py-3">
                                    Position
                                </th>

                                <th class="border px-4 py-3">
                                    Phone
                                </th>

                                <th class="border px-4 py-3">
                                    Email
                                </th>

                                <th class="border px-4 py-3 text-center">
                                    Action
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($groundStaff as $staff)

                                <tr class="hover:bg-gray-50">

                                    <td class="border px-4 py-3 text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $staff->staff_name }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $staff->position }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $staff->phone ?? '-' }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $staff->email ?? '-' }}
                                    </td>

                                    <td class="border px-4 py-3">

                                        <div class="flex justify-center items-center gap-2">

                                            {{-- Edit --}}
                                            <a href="{{ route('ground-staff.edit', $staff->staff_id) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('ground-staff.destroy', $staff->staff_id) }}"
                                                  method="POST"
                                                  class="inline-block"
                                                  onsubmit="return confirm('Are you sure you want to delete this ground staff?')">

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
                                    <td colspan="6"
                                        class="border px-4 py-6 text-center text-gray-500">
                                        No ground staff data available.
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