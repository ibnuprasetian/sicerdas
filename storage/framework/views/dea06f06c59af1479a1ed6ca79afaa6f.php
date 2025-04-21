<?php $__env->startSection('content'); ?>
<div class="px-8 py-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Materi - Forum Diskusi</h1>

    <ul class="space-y-3">
        <?php $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="bg-white p-4 rounded shadow hover:bg-gray-100">
                <a href="<?php echo e(route('teacher.diskusi.show', $materi->id)); ?>" class="text-blue-600 font-semibold text-lg">
                    <?php echo e($materi->judul); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/diskusi/index.blade.php ENDPATH**/ ?>