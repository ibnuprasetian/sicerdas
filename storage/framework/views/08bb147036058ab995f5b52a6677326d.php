<div class="bg-blue-600 p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
        <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
    </div>
    <div class="flex space-x-6 text-white items-center">
        <a href="<?php echo e(route('dashboard')); ?>" class="hover:underline">Dashboard</a>
        <a href="<?php echo e(route('materi')); ?>" class="hover:underline">Materi</a>
        <a href="<?php echo e(route('profile')); ?>" class="hover:underline">Profile</a>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="hover:underline bg-blue-500 px-4 py-2 rounded text-white">Log Out</button> <!-- Menambahkan kelas untuk Log Out -->
        </form>
    </div>
</div>
<?php /**PATH C:\laragon\www\sicerdas (v2)\sicerdas\resources\views/layouts/header.blade.php ENDPATH**/ ?>