<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Si Cerdas')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Navbar -->
            <nav class="bg-indigo-900 text-white px-6 py-3 flex justify-between">
                <div class="flex items-center space-x-4">
                    <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
                    <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
                </div>
                <div class="space-x-4">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->isStudent()): ?>
                            <a href="<?php echo e(route('student.dashboard')); ?>" class="hover:underline">Dashboard</a>
                            <a href="#" class="hover:underline">Materi</a>
                            <a href="#" class="hover:underline">Profile</a>
                        <?php elseif(Auth::user()->isTeacher()): ?>
                            <a href="<?php echo e(route('teacher.dashboard')); ?>" class="hover:underline">Dashboard</a>
                            <a href="#" class="hover:underline">Kelola Materi</a>
                            <a href="#" class="hover:underline">Profile</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="hover:underline">Log Out</a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php endif; ?>
                </div>
            </nav>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\sicerdas (v2)\sicerdas\resources\views/layouts/app.blade.php ENDPATH**/ ?>