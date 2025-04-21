<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Si Cerdas') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-indigo-900 text-white px-6 py-3">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/LogoSiCerdas.png') }}" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
                    <img src="{{ asset('images/TextSiCerdas.png') }}" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
                </div>

                <div class="hidden md:flex space-x-4">
                    @auth
                        @if (Auth::user()->isStudent())
                            <a href="{{ route('student.dashboard') }}" class="hover:underline">Dashboard</a>
                            <a href="{{ route('student.materi.index') }}" class="hover:underline">Materi</a>
                            <a href="{{ route('profile.edit') }}" class="hover:underline">Profile</a>
                        @elseif(Auth::user()->isTeacher())
                            <a href="{{ route('teacher.dashboard') }}" class="hover:underline">Dashboard</a>
                            <a href="{{ route('teacher.materi.index') }}" class="hover:underline">Kelola Materi</a>
                            <a href="{{ route('teacher.diskusi.index') }}" class="hover:underline">Forum Diskusi</a>
                            <a href="{{ route('teacher.users.index') }}" class="hover:underline">Kelola User</a>
                            <a href="{{ route('profile.edit') }}" class="hover:underline">Profile</a>
                        @endif
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="hover:underline">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endauth
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="hidden md:hidden mt-2">
                @auth
                    @if (Auth::user()->isStudent())
                        <a href="{{ route('student.dashboard') }}"
                            class="block px-4 py-2 hover:bg-indigo-700">Dashboard</a>
                        <a href="#" class="block px-4 py-2 hover:bg-indigo-700">Materi</a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-indigo-700">Profile</a>
                    @elseif(Auth::user()->isTeacher())
                        <a href="{{ route('teacher.dashboard') }}"
                            class="block px-4 py-2 hover:bg-indigo-700">Dashboard</a>
                        <a href="" class="block px-4 py-2 hover:bg-indigo-700">Kelola Materi</a>
                        <a href="{{ route('teacher.users.index') }}" class="block px-4 py-2 hover:bg-indigo-700">Kelola
                            User</a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-indigo-700">Profile</a>
                    @endif
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-4 py-2 hover:bg-indigo-700">Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endauth
            </div>
        </nav>

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
