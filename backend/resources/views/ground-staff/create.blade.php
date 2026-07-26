<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Ground Staff
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-6 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ground-staff.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Staff Name
                        </label>

                        <input
                            type="text"
                            name="staff_name"
                            value="{{ old('staff_name') }}"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Position
                        </label>

                        <input
                            type="text"
                            name="position"
                            value="{{ old('position') }}"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Save Staff
                        </button>

                        <a href="{{ route('ground-staff.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>