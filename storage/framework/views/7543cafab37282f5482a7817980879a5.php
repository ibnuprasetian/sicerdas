<?php $__env->startSection('content'); ?>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <h1 class="text-3xl font-semibold mb-4">
            Selamat Datang, <?php echo e(Auth::user()->name); ?> di Dashboard Guru
        </h1>

        <!-- Gambar Ilustrasi -->
        <div class="flex justify-center mb-6">
            <img src="<?php echo e(asset('images/wallpaper.png')); ?>" alt="Welcome Image" class="w-120 h-90">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/teacher/dashboard.blade.php ENDPATH**/ ?>