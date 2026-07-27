<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-bold text-slate-900">
                Airlines
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Manage airline master data in AeroOps.
            </p>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))

                <div class="mb-6 flex items-center gap-3
                            rounded-xl border border-emerald-200
                            bg-emerald-50 px-4 py-3
                            text-sm text-emerald-700">

                    <div class="flex h-8 w-8 shrink-0
                                items-center justify-center
                                rounded-lg bg-emerald-100">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 13l4 4L19 7" />

                        </svg>

                    </div>

                    <span class="font-medium">
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- Main Card --}}
            <div class="overflow-hidden rounded-2xl
                        border border-slate-200
                        bg-white shadow-sm">


                {{-- Card Header --}}
                <div class="flex flex-col gap-4
                            border-b border-slate-200
                            px-6 py-5
                            sm:flex-row
                            sm:items-center
                            sm:justify-between">

                    <div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Airline List
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            View and manage registered airlines.
                        </p>

                    </div>


                    {{-- Add Airline --}}
                    <a href="{{ route('airlines.create') }}"
                       class="inline-flex items-center
                              justify-center gap-2
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
                                  d="M12 4v16m8-8H4" />

                        </svg>

                        Add Airline

                    </a>

                </div>


                {{-- Table Container --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full">


                        {{-- Table Header --}}
                        <thead class="bg-slate-50">

                            <tr class="border-b border-slate-200">


                                {{-- Number --}}
                                <th class="w-20 px-6 py-3.5
                                           text-center
                                           text-xs font-semibold
                                           uppercase tracking-wider
                                           text-slate-500">

                                    No

                                </th>


                                {{-- Code --}}
                                <th class="px-6 py-3.5
                                           text-left
                                           text-xs font-semibold
                                           uppercase tracking-wider
                                           text-slate-500">

                                    Code

                                </th>


                                {{-- Airline Name --}}
                                <th class="px-6 py-3.5
                                           text-left
                                           text-xs font-semibold
                                           uppercase tracking-wider
                                           text-slate-500">

                                    Airline Name

                                </th>


                                {{-- Country --}}
                                <th class="px-6 py-3.5
                                           text-left
                                           text-xs font-semibold
                                           uppercase tracking-wider
                                           text-slate-500">

                                    Country

                                </th>


                                {{-- Action --}}
                                <th class="w-52 px-6 py-3.5
                                           text-center
                                           text-xs font-semibold
                                           uppercase tracking-wider
                                           text-slate-500">

                                    Action

                                </th>

                            </tr>

                        </thead>


                        {{-- Table Body --}}
                        <tbody class="divide-y divide-slate-100 bg-white">

                            @forelse ($airlines as $airline)

                                <tr class="transition hover:bg-slate-50/80">


                                    {{-- Number --}}
                                    <td class="whitespace-nowrap
                                               px-6 py-4
                                               text-center
                                               text-sm text-slate-500">

                                        {{ $loop->iteration }}

                                    </td>


                                    {{-- Airline Code --}}
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <span class="inline-flex
                                                     rounded-lg
                                                     bg-blue-50
                                                     px-2.5 py-1
                                                     text-xs font-bold
                                                     text-blue-700">

                                            {{ $airline->airline_code }}

                                        </span>

                                    </td>


                                    {{-- Airline Name --}}
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <span class="text-sm
                                                     font-semibold
                                                     text-slate-900">

                                            {{ $airline->airline_name }}

                                        </span>

                                    </td>


                                    {{-- Country --}}
                                    <td class="whitespace-nowrap
                                               px-6 py-4
                                               text-sm text-slate-600">

                                        {{ $airline->country }}

                                    </td>


                                    {{-- Actions --}}
                                    <td class="whitespace-nowrap
                                               px-6 py-4
                                               text-center">

                                        <div class="inline-flex
                                                    items-center
                                                    justify-center
                                                    gap-2">


                                            {{-- Edit --}}
                                            <a href="{{ route('airlines.edit', $airline->airline_id) }}"
                                               class="inline-flex
                                                      items-center
                                                      justify-center
                                                      rounded-lg
                                                      border border-slate-200
                                                      bg-white
                                                      px-3 py-2
                                                      text-xs font-semibold
                                                      text-slate-700
                                                      transition
                                                      hover:border-blue-200
                                                      hover:bg-blue-50
                                                      hover:text-blue-700">

                                                <svg class="mr-1.5 h-3.5 w-3.5"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />

                                                </svg>

                                                Edit

                                            </a>


                                            {{-- Delete --}}
                                            <form
                                                action="{{ route('airlines.destroy', $airline->airline_id) }}"
                                                method="POST"
                                                class="inline-flex"
                                                onsubmit="return confirm('Are you sure you want to delete this airline?')">

                                                @csrf
                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="inline-flex
                                                           items-center
                                                           justify-center
                                                           rounded-lg
                                                           border border-red-200
                                                           bg-white
                                                           px-3 py-2
                                                           text-xs font-semibold
                                                           text-red-600
                                                           transition
                                                           hover:bg-red-50
                                                           hover:text-red-700">

                                                    <svg class="mr-1.5 h-3.5 w-3.5"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />

                                                    </svg>

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                            @empty


                                {{-- Empty State --}}
                                <tr>

                                    <td colspan="5"
                                        class="px-6 py-16 text-center">

                                        <div class="mx-auto mb-4
                                                    flex h-12 w-12
                                                    items-center justify-center
                                                    rounded-xl
                                                    bg-slate-100
                                                    text-slate-400">

                                            <svg class="h-6 w-6"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.5"
                                                      d="M12 2a8 8 0 018 8c0 5-8 12-8 12S4 15 4 10a8 8 0 018-8z" />

                                                <circle cx="12"
                                                        cy="10"
                                                        r="2" />

                                            </svg>

                                        </div>


                                        <p class="text-sm
                                                  font-semibold
                                                  text-slate-700">

                                            No airlines found

                                        </p>


                                        <p class="mt-1
                                                  text-sm
                                                  text-slate-500">

                                            Add an airline to start managing airline data.

                                        </p>

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