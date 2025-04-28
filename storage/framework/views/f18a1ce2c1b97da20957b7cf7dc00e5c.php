<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>SiCerdas</title>
    <link rel="icon" href="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400,500,600,700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    transitionProperty: {
                        'height': 'height',
                        'spacing': 'margin, padding',
                        'transform': 'transform',
                        'opacity': 'opacity',
                        'visibility': 'visibility',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideInDown: {
                            '0%': { transform: 'translateY(-100%)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideOutUp: {
                            '0%': { transform: 'translateY(0)', opacity: '1' },
                            '100%': { transform: 'translateY(-100%)', opacity: '0' },
                        },
                        pulse: {
                            '0%, 100%': { opacity: 1 },
                            '50%': { opacity: 0.8 },
                        },
                        wave: {
                            '0%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.05)' },
                            '100%': { transform: 'scale(1)' },
                        },
                    },
                    animation: {
                        fadeIn: 'fadeIn 0.3s ease-in-out',
                        slideInDown: 'slideInDown 0.3s ease-out',
                        slideOutUp: 'slideOutUp 0.3s ease-in',
                        pulse: 'pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        wave: 'wave 1s ease-in-out infinite',
                    },
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease;
        }

        nav {
            background: linear-gradient(135deg, #3730a3, #4c1d95);
            /* Gradient background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            transition: box-shadow 0.3s ease;
        }

        nav:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            /* Slightly stronger shadow on hover */
        }

        nav a {
            position: relative;
            /* For the underline effect */
            padding-bottom: 0.2rem;
            /* Space for the underline */
        }

        nav a:hover {
            color: #a78bfa !important;
            transform: translateY(-1px);
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        nav a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: #a78bfa;
            /* Highlight color */
            transition: width 0.3s ease-in-out;
        }

        nav a:hover::before {
            width: 100%;
        }

        .mobile-menu {
            animation-duration: 0.3s;
            animation-timing-function: ease-out;
            transform-origin: top;
        }

        .mobile-menu.menu-visible {
            animation-name: slideInDown;
        }

        .mobile-menu.menu-hidden {
            animation-name: slideOutUp;
            visibility: hidden;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hidden-mobile {
                display: none !important;
            }

            .mobile-only {
                display: block !important;
            }

            .space-x-6>*+* {
                margin-left: 0.75rem;
            }
        }

        @media (min-width: 769px) {
            .mobile-only {
                display: none !important;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="font-poppins antialiased bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-indigo-900 text-white px-4 py-3 shadow-md fixed top-0 left-0 right-0 z-50">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2 animate-wave">
                    <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-10 h-10 mr-1">
                    <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Text" class="w-28 h-8">
                </div>

                <div class="hidden md:flex space-x-6 text-lg items-center pt-1">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->isStudent()): ?>
                            <a href="<?php echo e(route('student.dashboard')); ?>" class="hover:underline">Dashboard</a>
                            <a href="<?php echo e(route('student.materi.index')); ?>" class="hover:underline">Materi</a>
                            <a href="<?php echo e(route('quiz.petualangan.map')); ?>" class="hover:underline">Quiz</a>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="hover:underline">Profile</a>
                        <?php elseif(Auth::user()->isTeacher()): ?>
                            <a href="<?php echo e(route('teacher.dashboard')); ?>" class="hover:underline">Dashboard</a>
                            <a href="<?php echo e(route('teacher.materi.index')); ?>" class="hover:underline">Kelola Materi</a>
                            <a href="<?php echo e(route('teacher.diskusi.index')); ?>" class="hover:underline">Diskusi Siswa</a>
                            <a href="<?php echo e(route('teacher.quiz.index')); ?>" class="hover:underline">Kelola Quiz</a>
                            <a href="<?php echo e(route('teacher.users.index')); ?>" class="hover:underline">Kelola User</a>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="hover:underline">Profile</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="hover:underline"><i class="fas fa-sign-out-alt mr-1"></i> Log Out</a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden"><?php echo csrf_field(); ?></form>
                    <?php endif; ?>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button"
                        class="text-white focus:outline-none focus:ring-2 focus:ring-indigo-400 p-2 rounded">
                        <svg class="h-7 w-7 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <div id="mobile-menu"
            class="mobile-menu menu-hidden origin-top md:hidden mt-12 overflow-hidden bg-indigo-800 rounded shadow-md">
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->isStudent()): ?>
                    <a href="<?php echo e(route('student.dashboard')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                    <a href="<?php echo e(route('student.materi.index')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-book-open mr-2"></i> Materi</a>
                    <a href="<?php echo e(route('quiz.petualangan.map')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-map-marked-alt mr-2"></i> Quiz</a>
                    <a href="<?php echo e(route('profile.edit')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-user-cog mr-2"></i> Profile</a>
                <?php elseif(Auth::user()->isTeacher()): ?>
                    <a href="<?php echo e(route('teacher.dashboard')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                    <a href="<?php echo e(route('teacher.materi.index')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-book mr-2"></i> Kelola Materi</a>
                    <a href="<?php echo e(route('teacher.diskusi.index')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-users-cog mr-2"></i> Diskusi Siswa</a>
                    <a href="<?php echo e(route('teacher.quiz.index')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-question-circle mr-2"></i> Kelola Quiz</a>
                    <a href="<?php echo e(route('teacher.users.index')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-users-cog mr-2"></i> Kelola User</a>
                    <a href="<?php echo e(route('profile.edit')); ?>"
                        class="block px-4 py-2 text-white hover:bg-indigo-700 transition rounded"><i
                            class="fas fa-user-cog mr-2"></i> Profile</a>
                <?php endif; ?>
                <a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="block px-4 py-2 text-white hover:bg-red-700 transition rounded"><i
                        class="fas fa-sign-out-alt mr-2"></i> Log Out</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                    <?php echo csrf_field(); ?>
                </form>
            <?php endif; ?>
        </div>

        <?php if(isset($header)): ?>
            <header class="bg-white shadow mt-16 md:mt-14">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?>

        <main class="py-6 sm:py-8 lg:py-10">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script>
        const menu = document.getElementById('mobile-menu');
        const toggleButton = document.getElementById('mobile-menu-button');

        toggleButton.addEventListener('click', function () {
            menu.classList.toggle('menu-visible');
            menu.classList.toggle('menu-hidden');
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php if(request()->routeIs('quiz.petualangan.map') || request()->routeIs('quiz.petualangan.index')): ?>
        <audio id="bg-music" src="<?php echo e(asset('audio/petualangan.mp3')); ?>" loop></audio>
        <script>
            let music = document.getElementById('bg-music');
            music.volume = 0.30;

            if (!sessionStorage.getItem('bg-music-playing')) {
                music.play().then(() => {
                    sessionStorage.setItem('bg-music-playing', 'true');
                }).catch((error) => {
                    document.addEventListener('click', function once() {
                        music.play();
                        sessionStorage.setItem('bg-music-playing', 'true');
                        document.removeEventListener('click', once);
                    });
                });
            } else {
                let savedTime = sessionStorage.getItem('bg-music-time');
                if (savedTime) {
                    music.currentTime = savedTime;
                }
                music.play();
            }

            window.addEventListener('beforeunload', function () {
                sessionStorage.setItem('bg-music-time', music.currentTime);
            });
        </script>
    <?php endif; ?>
</body>

</html><?php /**PATH C:\laragon\www\sicerdas\resources\views/layouts/app.blade.php ENDPATH**/ ?>