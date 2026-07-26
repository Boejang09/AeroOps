<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Ground Handling Service
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-6 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ground-handling-services.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label for="service_name"
                               class="block font-medium mb-2">
                            Service Name
                        </label>

                        <input
                            type="text"
                            id="service_name"
                            name="service_name"
                            value="{{ old('service_name') }}"
                            class="w-full border rounded-lg p-2"
                            placeholder="Example: Cargo Handling"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="description"
                               class="block font-medium mb-2">
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="w-full border rounded-lg p-2"
                            placeholder="Enter service description">{{ old('description') }}</textarea>
                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Save Service
                        </button>

                        <a href="{{ route('ground-handling-services.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>