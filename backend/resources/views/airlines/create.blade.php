<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-bold text-slate-900">
                Add Airline
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Add a new airline to AeroOps master data.
            </p>
        </div>
    </x-slot>


    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200
                            bg-red-50 px-5 py-4">

                    <div class="flex items-start gap-3">

                        <div class="flex h-9 w-9 shrink-0
                                    items-center justify-center
                                    rounded-lg bg-red-100 text-red-600">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />

                            </svg>

                        </div>

                        <div>
                            <p class="text-sm font-semibold text-red-800">
                                Please check the information below.
                            </p>

                            <ul class="mt-2 space-y-1 text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
            @endif


            {{-- Form Card --}}
            <div class="overflow-hidden rounded-2xl
                        border border-slate-200
                        bg-white shadow-sm">

                {{-- Card Header --}}
                <div class="border-b border-slate-200 px-6 py-5">

                    <h3 class="text-lg font-bold text-slate-900">
                        Airline Information
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Enter the basic information for the new airline.
                    </p>

                </div>


                <form action="{{ route('airlines.store') }}"
                      method="POST">

                    @csrf


                    {{-- Form Content --}}
                    <div class="space-y-6 px-6 py-6">


                        {{-- Airline Name --}}
                        <div>

                            <label for="airline_name"
                                   class="block text-sm font-semibold text-slate-700">

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
                                value="{{ old('airline_name') }}"
                                placeholder="Example: Garuda Indonesia"
                                autocomplete="off"
                                required
                                class="mt-2 block w-full rounded-lg
                                       border-slate-300
                                       bg-white px-3 py-2.5
                                       text-sm text-slate-900
                                       shadow-sm
                                       placeholder:text-slate-400
                                       focus:border-blue-500
                                       focus:ring-blue-500
                                       @error('airline_name')
                                           border-red-300
                                       @enderror"
                            >

                            @error('airline_name')
                                <p class="mt-2 text-xs font-medium text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Code + Country --}}
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                            {{-- Airline Code --}}
                            <div>

                                <label for="airline_code"
                                       class="block text-sm font-semibold text-slate-700">

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
                                    value="{{ old('airline_code') }}"
                                    placeholder="Example: GA"
                                    autocomplete="off"
                                    required
                                    class="mt-2 block w-full rounded-lg
                                           border-slate-300
                                           bg-white px-3 py-2.5
                                           text-sm uppercase text-slate-900
                                           shadow-sm
                                           placeholder:normal-case
                                           placeholder:text-slate-400
                                           focus:border-blue-500
                                           focus:ring-blue-500
                                           @error('airline_code')
                                               border-red-300
                                           @enderror"
                                >

                                @error('airline_code')
                                    <p class="mt-2 text-xs font-medium text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Country --}}
                            <div>

                                <label for="country"
                                       class="block text-sm font-semibold text-slate-700">

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
                                    value="{{ old('country') }}"
                                    placeholder="Example: Indonesia"
                                    autocomplete="off"
                                    required
                                    class="mt-2 block w-full rounded-lg
                                           border-slate-300
                                           bg-white px-3 py-2.5
                                           text-sm text-slate-900
                                           shadow-sm
                                           placeholder:text-slate-400
                                           focus:border-blue-500
                                           focus:ring-blue-500
                                           @error('country')
                                               border-red-300
                                           @enderror"
                                >

                                @error('country')
                                    <p class="mt-2 text-xs font-medium text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- Form Actions --}}
                    <div class="flex flex-col-reverse gap-3
                                border-t border-slate-200
                                bg-slate-50/70 px-6 py-4
                                sm:flex-row sm:items-center sm:justify-end">

                        {{-- Cancel --}}
                        <a href="{{ route('airlines.index') }}"
                           class="inline-flex items-center justify-center
                                  rounded-lg border border-slate-300
                                  bg-white px-4 py-2.5
                                  text-sm font-semibold text-slate-700
                                  shadow-sm transition
                                  hover:bg-slate-50
                                  hover:text-slate-900">

                            Cancel

                        </a>


                        {{-- Save --}}
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2
                                   rounded-lg bg-blue-600
                                   px-4 py-2.5
                                   text-sm font-semibold text-white
                                   shadow-sm transition
                                   hover:bg-blue-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:ring-offset-2">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7" />

                            </svg>

                            Save Airline

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>