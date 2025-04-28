<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Si Cerdas')); ?></title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-900 antialiased">

    <nav class="bg-blue-700 text-white py-4 px-8">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
                <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="<?php echo e(route('login')); ?>" class="text-white hover:text-gray-200">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="text-white hover:text-gray-200">Register</a>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden mt-2">
            <a href="<?php echo e(route('login')); ?>" class="block px-4 py-2 hover:bg-blue-600">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="block px-4 py-2 hover:bg-blue-600">Register</a>
        </div>
    </nav>

    <section class="flex justify-center items-center min-h-screen bg-blue-50">
        <div class="flex items-center justify-between w-full max-w-screen-lg p-6">
            <div>
                <img src="<?php echo e(asset('images/wallpaper.png')); ?>" alt="Welcome Image" class="w-full h-auto">
            </div>
        </div>
    </section>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/welcome.blade.php ENDPATH**/ ?>