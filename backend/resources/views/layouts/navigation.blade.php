<nav x-data="{ open: false }">

    {{-- =========================================
         MOBILE TOP BAR
    ========================================== --}}
    <div class="lg:hidden fixed top-0 left-0 right-0 z-50 h-16
                bg-slate-950 flex items-center justify-between
                px-4 border-b border-slate-800">

        {{-- Brand --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3">

            <div class="w-9 h-9 rounded-lg bg-blue-600
                        flex items-center justify-center">

                <span class="text-white font-bold text-lg">
                    A
                </span>

            </div>

            <div>
                <div class="text-white font-bold text-lg leading-tight">
                    AeroOps
                </div>

                <div class="text-slate-400 text-[10px]">
                    Ground Operations
                </div>
            </div>

        </a>


        {{-- Hamburger Button --}}
        <button
            @click="open = !open"
            type="button"
            class="p-2 rounded-lg text-slate-300
                   hover:bg-slate-800 hover:text-white
                   transition"
            aria-label="Toggle navigation"
        >

            {{-- Menu --}}
            <svg
                x-show="!open"
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>


            {{-- Close --}}
            <svg
                x-show="open"
                style="display: none;"
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>

        </button>

    </div>



    {{-- =========================================
         MOBILE OVERLAY
    ========================================== --}}
    <div
        x-show="open"
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        style="display: none;"
    ></div>



    {{-- =========================================
         SIDEBAR
    ========================================== --}}
    <aside
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50
               w-64 bg-slate-950
               flex flex-col
               transition-transform duration-300
               lg:translate-x-0"
    >

        {{-- =====================================
             BRAND
        ====================================== --}}
        <div class="h-20 shrink-0
                    flex items-center px-6
                    border-b border-slate-800">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3">

                {{-- Temporary Logo --}}
                <div class="w-10 h-10 rounded-xl
                            bg-blue-600
                            flex items-center justify-center
                            shadow-lg shadow-blue-950/40">

                    <span class="text-white font-bold text-xl">
                        A
                    </span>

                </div>


                {{-- Brand --}}
                <div>

                    <div class="text-white font-bold
                                text-xl leading-tight">
                        AeroOps
                    </div>

                    <div class="text-slate-400 text-xs">
                        Ground Operations
                    </div>

                </div>

            </a>

        </div>



        {{-- =====================================
             NAVIGATION
        ====================================== --}}
        <div class="flex-1 min-h-0 overflow-y-auto
                    sidebar-scroll px-4 py-5">


            {{-- Navigation --}}
            <p class="px-3 mb-2
                      text-[11px] font-semibold
                      tracking-wider text-slate-500 uppercase">

                Navigation

            </p>


            {{-- Dashboard --}}
            <a
                href="{{ route('dashboard') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('dashboard')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Dashboard

            </a>



            {{-- =================================
                 MASTER DATA
            ================================== --}}
            <p class="px-3 mt-5 mb-2
                      text-[11px] font-semibold
                      tracking-wider text-slate-500 uppercase">

                Master Data

            </p>


            {{-- Airlines --}}
            <a
                href="{{ route('airlines.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('airlines.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Airlines

            </a>


            {{-- Aircraft --}}
            <a
                href="{{ route('aircraft.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('aircraft.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Aircraft

            </a>


            {{-- Ground Staff --}}
            <a
                href="{{ route('ground-staff.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('ground-staff.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Ground Staff

            </a>


            {{-- Services --}}
            <a
                href="{{ route('ground-handling-services.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('ground-handling-services.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Services

            </a>



            {{-- =================================
                 OPERATIONS
            ================================== --}}
            <p class="px-3 mt-5 mb-2
                      text-[11px] font-semibold
                      tracking-wider text-slate-500 uppercase">

                Operations

            </p>


            {{-- Flights --}}
            <a
                href="{{ route('flights.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('flights.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Flights

            </a>


            {{-- Assignments --}}
            <a
                href="{{ route('assignments.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('assignments.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Assignments

            </a>



            {{-- =================================
                 REPORTING
            ================================== --}}
            <p class="px-3 mt-5 mb-2
                      text-[11px] font-semibold
                      tracking-wider text-slate-500 uppercase">

                Reporting

            </p>


            {{-- Operational Reports --}}
            <a
                href="{{ route('operational-reports.index') }}"
                @click="open = false"
                class="block px-3 py-2.5 rounded-lg mb-1
                       text-sm font-medium
                       {{ request()->routeIs('operational-reports.*')
                            ? 'bg-blue-600 text-white'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}
                       transition"
            >

                Operational Reports

            </a>

        </div>

    </aside>

</nav>