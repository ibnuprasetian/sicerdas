<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Si Cerdas')); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navbar -->
        <nav class="bg-indigo-900 text-white px-6 py-3">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
                    <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
                </div>

                <div class="hidden md:flex space-x-4 flex-grow justify-end items-center">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->isStudent()): ?>
                            <a href="<?php echo e(route('student.dashboard')); ?>" class="hover:underline">Dashboard</a>
                            <a href="#" class="hover:underline">Materi</a>
                            <div class="dropdown">
                                <button class="btn btn-link text-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Quiz
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e(route('quiz.petualangan.map')); ?>">Petualangan Edukasi</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('multiplayer.index')); ?>">Kuis Multiplayer</a></li>
                                </ul>
                            </div>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="hover:underline">Profile</a>
                        <?php elseif(Auth::user()->isTeacher()): ?>
                            <a href="<?php echo e(route('teacher.dashboard')); ?>" class="hover:underline">Dashboard</a>
                            <a href="#" class="hover:underline">Kelola Materi</a>
                            <a href="<?php echo e(route('teacher.users.index')); ?>" class="hover:underline">Kelola User</a>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="hover:underline">Profile</a>
                            <a href="<?php echo e(route('teacher.quiz.index')); ?>" class="hover:underline">Kelola Quiz</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden"><?php echo csrf_field(); ?></form>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <!-- Musik Petualangan hanya di halaman tertentu -->
    <?php if(request()->routeIs('quiz.petualangan.map') || request()->routeIs('quiz.petualangan.index')): ?>
        <!-- Hanya buat elemen audio sekali jika belum ada -->
        <audio id="bg-music" src="<?php echo e(asset('audio/petualangan.mp3')); ?>" loop></audio>

        <script>
            let music = document.getElementById('bg-music');

            // Set volume 30% (0.30)
            music.volume = 0.30;

            // Jika musik belum diputar sebelumnya, mulai musik
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
                // Lanjutkan musik dari posisi terakhir yang disimpan
                let savedTime = sessionStorage.getItem('bg-music-time');
                if (savedTime) {
                    music.currentTime = savedTime;
                }
                music.play();
            }

            // Simpan posisi musik setiap kali berpindah soal (sebelum halaman ditutup)
            window.addEventListener('beforeunload', function () {
                sessionStorage.setItem('bg-music-time', music.currentTime);
            });
        </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/layouts/app.blade.php ENDPATH**/ ?>