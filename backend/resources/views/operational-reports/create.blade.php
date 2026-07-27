<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Operational Report
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Add New Operational Report
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

                <form action="{{ route('operational-reports.store') }}" method="POST">
                    @csrf

                    {{-- Assignment --}}
                    <div class="mb-4">
                        <label for="assignment_id"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Assignment
                        </label>

                        <select name="assignment_id"
                            id="assignment_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>

                            <option value="">Select Assignment</option>

                            @foreach ($assignments as $assignment)
                                <option value="{{ $assignment->assignment_id }}"
                                    {{ old('assignment_id') == $assignment->assignment_id ? 'selected' : '' }}>

                                    {{ $assignment->flight->flight_number ?? '-' }}
                                    |
                                    {{ $assignment->groundStaff->staff_name ?? '-' }}
                                    |
                                    {{ $assignment->service->service_name ?? '-' }}

                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Report Date --}}
                    <div class="mb-4">
                        <label for="report_date"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Report Date
                        </label>

                        <input type="date"
                            name="report_date"
                            id="report_date"
                            value="{{ old('report_date') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 mb-1">
                            Description
                        </label>

                        <textarea name="description"
                            id="description"
                            rows="4"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            placeholder="Describe the operational activity...">{{ old('description') }}</textarea>
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
                            <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                            <option value="Submitted" {{ old('status') == 'Submitted' ? 'selected' : '' }}>Submitted</option>
                            <option value="Approved" {{ old('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                            <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>

                        </select>
                    </div>

                    <div class="flex justify-end gap-2">

                        <a href="{{ route('operational-reports.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Save Report
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>