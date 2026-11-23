<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? (View::hasSection('title') ? View::yieldContent('title') : 'ONE SDP Admin Panel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .dashboard-dropdown-wrap {
            position: relative;
            display: flex;
            height: 100%;
            align-items: center;
        }

        .dashboard-submenu {
            display: none;
            position: fixed;
            z-index: 99999;
            min-width: 176px;
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 4px 0;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        .dashboard-submenu.is-open {
            display: block;
        }

        .dashboard-dropdown-wrap.is-open .dashboard-arrow {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="min-h-screen bg-[#eef2f6] font-sans text-slate-800 antialiased">
    @php
        $navItems = $navItems ?? [
            ['Dashboard', 'dashboard'],
        ];
    @endphp


    <header class="bg-white border-b border-slate-200 sticky top-0 z-30 w-full">
        <div class="flex h-14 w-full items-center justify-between gap-2 px-3 sm:px-5">
            <div class="flex shrink-0 items-center gap-2">
                <button type="button" id="mobile-menu-btn" class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 xl:hidden" aria-label="Toggle Menu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 pr-2">
                    <span class="flex h-7 w-7 items-center justify-center rounded-md bg-gradient-to-br from-blue-500 to-blue-600 text-sm font-bold text-white">S</span>
                    <span class="whitespace-nowrap text-[17px] font-bold tracking-tight text-slate-800">ONE <span class="font-semibold text-slate-700">SDP</span></span>
                </a>
            </div>

            <nav class="hidden h-full flex-1 items-center justify-start space-x-1 overflow-x-auto pl-3 xl:flex">
                <a href="{{ route('user') }}"
                   class="flex h-full items-center px-2.5 text-[12.5px] font-medium whitespace-nowrap {{ request()->routeIs('user') ? 'border-b-2 border-blue-600 text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                    Home
                </a>

                <div class="dashboard-dropdown-wrap">
                    <a href="#"
                       class="flex h-full items-center gap-1 px-2.5 text-[12.5px] font-medium whitespace-nowrap {{ request()->routeIs('dashboard') ? 'border-b-2 border-blue-600 text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
                        <span>Setting</span>
                        <svg class="dashboard-arrow h-3.5 w-3.5 transition-transform duration-150"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                  clip-rule="evenodd" />
                        </svg>
                    </a>

                    <!-- Auto Dropdown Submenu on Hover -->
                    <div class="dashboard-submenu">
                        <a href="{{ route('user') }}"
                           class="block px-3.5 py-2 text-[12.5px] text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                           Users
                        </a>
                        <a href="{{ route('user.create') }}"
                           class="block px-3.5 py-2 text-[12.5px] text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            Create user
                        </a>
                        {{-- <a href="{{ route('user.permission') }}"
                           class="block px-3.5 py-2 text-[12.5px] text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            Permissions
                        </a> --}}
                    </div>
                </div>
            </nav>

            <div class="relative shrink-0">
                <button type="button" id="user-profile-btn" class="flex items-center gap-2.5 rounded-lg px-2 py-1.5 hover:bg-slate-50">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full border border-slate-200 bg-slate-100 text-xs font-bold text-slate-700">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                    <span class="hidden text-left leading-tight sm:block">
                        <span class="block text-xs font-semibold text-slate-800">{{ Auth::user()->name ?? 'User' }}</span>
                        <span class="block text-[11px] text-slate-400">User</span>
                    </span>
                    <svg class="hidden h-3.5 w-3.5 text-slate-400 sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div id="user-dropdown" class="absolute right-0 z-40 mt-1.5 hidden w-52 rounded-xl border border-slate-200 bg-white py-1.5 shadow-lg">
                    <div class="border-b border-slate-100 px-4 py-2.5">
                        <p class="text-xs font-semibold text-slate-800">{{ Auth::user()->name ?? 'User' }}</p>
                        <p class="truncate text-[11px] text-slate-500">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                    {{-- <a href="{{ route('profile.edit') }}" class="flex px-4 py-2 text-xs text-slate-700 hover:bg-slate-50">My Profile</a> --}}
                    <div class="my-1 border-t border-slate-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 text-left text-xs font-semibold text-red-600 hover:bg-red-50">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="mobile-nav-drawer" class="hidden max-h-[75vh] overflow-y-auto border-t border-slate-200 bg-white px-3 py-3 shadow-md xl:hidden">
            <div class="grid grid-cols-1 gap-1 sm:grid-cols-2">

            </div>
        </div>
    </header>

    <main class="flex-1 w-full max-w-[1600px] mx-auto px-4 sm:px-6 py-6 space-y-5">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <script>
        (function () {
            const wrap = document.querySelector('.dashboard-dropdown-wrap');
            if (!wrap) return;

            const trigger = wrap.querySelector('a');
            const menu = wrap.querySelector('.dashboard-submenu');
            let closeTimer = null;

            function positionMenu() {
                if (!menu || !trigger) return;
                const rect = trigger.getBoundingClientRect();
                menu.style.top = (rect.bottom - 1) + 'px';
                menu.style.left = rect.left + 'px';
            }

            function openMenu() {
                clearTimeout(closeTimer);
                positionMenu();
                wrap.classList.add('is-open');
                menu.classList.add('is-open');
            }

            function scheduleClose() {
                closeTimer = setTimeout(() => {
                    wrap.classList.remove('is-open');
                    menu.classList.remove('is-open');
                }, 120);
            }

            wrap.addEventListener('mouseenter', openMenu);
            wrap.addEventListener('mouseleave', scheduleClose);
            menu.addEventListener('mouseenter', openMenu);
            menu.addEventListener('mouseleave', scheduleClose);

            window.addEventListener('resize', positionMenu);
            window.addEventListener('scroll', positionMenu, true);
        })();

        document.getElementById('user-profile-btn')?.addEventListener('click', function () {
            document.getElementById('user-dropdown')?.classList.toggle('hidden');
        });

        document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
            document.getElementById('mobile-nav-drawer')?.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            const button = document.getElementById('user-profile-btn');
            const dropdown = document.getElementById('user-dropdown');
            if (button && dropdown && !button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
