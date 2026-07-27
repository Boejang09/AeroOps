<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">
                Edit Airline
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Update airline information in AeroOps master data.
            </p>
        </div>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-4xl mx-auto">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                    <div class="text-sm font-semibold text-red-800">
                        Please check the information below.
                    </div>

                    <ul class="mt-2 list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- Form Card --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                {{-- Card Header --}}
                <div class="px-6 py-5 border-b border-slate-200">

                    <h3 class="text-lg font-semibold text-slate-900">
                        Airline Information
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Update the information for this airline.
                    </p>

                </div>


                <form
                    action="{{ route('airlines.update', $airline->airline_id) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    {{-- Form Content --}}
                    <div class="p-6 space-y-6">

                        {{-- Airline Name --}}
                        <div>

                            <label
                                for="airline_name"
                                class="block text-sm font-medium text-slate-800"
                            >
                                Airline Name
                                <span class="text-red-500">*</span>
                            </label>

                            <p class="mt-1 text-xs text-slate-500">
                                Official name of the airline.
                            </p>

                            <input
                                id="airline_name"
                                type="text"
                                name="airline_name"
                                value="{{ old('airline_name', $airline->airline_name) }}"
                                required
                                class="mt-3 block w-full rounded-lg border-slate-300
                                       text-slate-900 shadow-sm
                                       placeholder:text-slate-400
                                       focus:border-blue-500
                                       focus:ring-blue-500"
                            >

                        </div>


                        {{-- Code & Country --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Airline Code --}}
                            <div>

                                <label
                                    for="airline_code"
                                    class="block text-sm font-medium text-slate-800"
                                >
                                    Airline Code
                                    <span class="text-red-500">*</span>
                                </label>

                                <p class="mt-1 text-xs text-slate-500">
                                    Short airline identifier.
                                </p>

                                <input
                                    id="airline_code"
                                    type="text"
                                    name="airline_code"
                                    value="{{ old('airline_code', $airline->airline_code) }}"
                                    required
                                    class="mt-3 block w-full rounded-lg border-slate-300
                                           text-slate-900 shadow-sm
                                           focus:border-blue-500
                                           focus:ring-blue-500"
                                >

                            </div>


                            {{-- Country --}}
                            <div>

                                <label
                                    for="country"
                                    class="block text-sm font-medium text-slate-800"
                                >
                                    Country
                                    <span class="text-red-500">*</span>
                                </label>

                                <p class="mt-1 text-xs text-slate-500">
                                    Country where the airline is based.
                                </p>

                                <input
                                    id="country"
                                    type="text"
                                    name="country"
                                    value="{{ old('country', $airline->country) }}"
                                    required
                                    class="mt-3 block w-full rounded-lg border-slate-300
                                           text-slate-900 shadow-sm
                                           focus:border-blue-500
                                           focus:ring-blue-500"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-200
                                flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                        <a
                            href="{{ route('airlines.index') }}"
                            class="inline-flex items-center justify-center
                                   px-4 py-2.5 rounded-lg
                                   border border-slate-300 bg-white
                                   text-sm font-medium text-slate-700
                                   hover:bg-slate-50 transition"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2
                                   px-5 py-2.5 rounded-lg
                                   bg-blue-600 text-white
                                   text-sm font-semibold
                                   hover:bg-blue-700
                                   focus:outline-none
                                   focus:ring-2 focus:ring-blue-500
                                   focus:ring-offset-2
                                   transition"
                        >

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                            Save Changes

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>