<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Si Cerdas')); ?></title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans text-gray-900 antialiased">

    <!-- Navbar -->
    <nav class="bg-blue-700 text-white py-4 px-8 flex justify-between items-center">
        <div class="flex items-center">
            <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
            <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
        </div>
        <div class="space-x-4">
            <a href="<?php echo e(route('login')); ?>" class="text-white hover:text-gray-200">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="text-white hover:text-gray-200">Register</a>
        </div>
    </nav>

    <!-- Welcome--> 
    <section class="flex justify-center items-center min-h-screen bg-blue-50">
        <div class="flex items-center justify-between w-full max-w-screen-lg p-6">
            <div>
                <img src="<?php echo e(asset('images/wallpaper.png')); ?>" alt="Welcome Image" class="w-full h-auto">
            </div>
        </div>
    </section>

</body>
</html>
<?php /**PATH C:\laragon\www\sicerdas (v2)\sicerdas\resources\views/welcome.blade.php ENDPATH**/ ?>