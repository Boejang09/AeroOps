<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >


    <title>
        {{ config('app.name', 'AeroOps') }}
    </title>


    {{-- Fonts --}}
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet"
    >


    {{-- Vite --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="font-sans antialiased bg-slate-50">

    <div class="min-h-screen">


        {{-- =====================================
             SIDEBAR
        ====================================== --}}
        @include('layouts.navigation')



        {{-- =====================================
             MAIN AREA
        ====================================== --}}
        <div class="lg:ml-64 min-h-screen">


            {{-- =================================
                 TOP HEADER
            ================================== --}}
            <header
                x-data="{ userMenu: false }"
                class="fixed top-0 right-0 left-0
                       lg:left-64
                       z-30
                       h-16 lg:h-20
                       bg-white
                       border-b border-slate-200"
            >

                <div class="h-full flex items-center
                            justify-between
                            px-4 sm:px-6 lg:px-8">


                    {{-- =========================
                         PAGE TITLE
                    ========================== --}}
                    <div class="hidden lg:block">

                        @isset($header)

                            {{ $header }}

                        @else

                            <h1 class="text-xl font-semibold text-slate-900">
                                Dashboard
                            </h1>

                        @endisset

                    </div>



                    {{-- Mobile spacing --}}
                    <div class="lg:hidden"></div>



                    {{-- =========================
                         ADMIN ACCOUNT
                    ========================== --}}
                    <div class="relative">


                        {{-- Admin Button --}}
                        <button
                            @click="userMenu = !userMenu"
                            @click.outside="userMenu = false"
                            type="button"
                            class="flex items-center gap-3
                                   px-3 py-2
                                   rounded-xl
                                   hover:bg-slate-100
                                   transition"
                        >

                            {{-- Avatar --}}
                            <div class="w-9 h-9
                                        rounded-full
                                        bg-blue-100
                                        flex items-center justify-center">

                                <span class="text-sm font-bold text-blue-700">

                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                                </span>

                            </div>


                            {{-- User Name --}}
                            <div class="hidden sm:block text-left">

                                <p class="text-sm font-semibold text-slate-800 leading-tight">

                                    {{ Auth::user()->name }}

                                </p>

                                <p class="text-[11px] text-slate-500">

                                    Administrator

                                </p>

                            </div>


                            {{-- Chevron --}}
                            <svg
                                class="hidden sm:block w-4 h-4
                                       text-slate-400
                                       transition-transform duration-200"
                                :class="userMenu ? 'rotate-180' : ''"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />

                            </svg>

                        </button>



                        {{-- =====================
                             DROPDOWN
                        ====================== --}}
                        <div
                            x-show="userMenu"
                            x-transition
                            @click.outside="userMenu = false"
                            style="display: none;"
                            class="absolute right-0 mt-2
                                   w-56
                                   bg-white
                                   rounded-xl
                                   border border-slate-200
                                   shadow-xl
                                   overflow-hidden"
                        >


                            {{-- User Info --}}
                            <div class="px-4 py-3
                                        border-b border-slate-100">

                                <p class="text-sm font-semibold
                                          text-slate-900 truncate">

                                    {{ Auth::user()->name }}

                                </p>

                                <p class="text-xs text-slate-500 truncate">

                                    {{ Auth::user()->email }}

                                </p>

                            </div>



                            {{-- Profile --}}
                            <div class="p-2">

                                <a
                                    href="{{ route('profile.edit') }}"
                                    class="flex items-center
                                           px-3 py-2
                                           text-sm text-slate-700
                                           rounded-lg
                                           hover:bg-slate-100
                                           transition"
                                >

                                    Profile

                                </a>

                            </div>



                            {{-- Logout --}}
                            <div class="p-2 pt-0">

                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full
                                               text-left
                                               px-3 py-2
                                               text-sm text-red-600
                                               rounded-lg
                                               hover:bg-red-50
                                               transition"
                                    >

                                        Log Out

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </header>



            {{-- =================================
                 PAGE CONTENT
            ================================== --}}
            <main class="pt-16 lg:pt-20 min-h-screen">

                {{ $slot }}

            </main>


        </div>

    </div>

</body>

</html>