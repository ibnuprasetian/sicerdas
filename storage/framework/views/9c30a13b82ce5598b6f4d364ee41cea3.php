<?php $__env->startSection('content'); ?>
<div class="px-8 py-6">
    <a href="<?php echo e(route('teacher.diskusi.index')); ?>" class="text-sm text-blue-500 hover:underline mb-4 inline-block">
        ← Kembali ke Daftar Materi
    </a>

    <h1 class="text-2xl font-bold mb-6">Diskusi: <?php echo e($materi->judul); ?></h1>

    <?php $__currentLoopData = $materi->subMateris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-8 border-b pb-4">
            <h2 class="text-xl font-semibold text-gray-800"><?php echo e($sub->judul); ?></h2>

            <?php $__empty_1 = true; $__currentLoopData = $sub->discussions->where('parent_id', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diskusi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white p-4 rounded shadow mt-4">
                    <p class="text-blue-700 font-semibold"><?php echo e($diskusi->user->name); ?>:</p>
                    <p class="mb-2"><?php echo e($diskusi->message); ?></p>

                    <?php $__currentLoopData = $diskusi->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ml-4 mt-2 p-2 bg-gray-100 rounded">
                            <p class="text-green-700 font-semibold"><?php echo e($reply->user->name); ?> (Guru):</p>
                            <p><?php echo e($reply->message); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <form action="<?php echo e(route('teacher.discussions.reply')); ?>" method="POST" class="mt-3 ml-4">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="parent_id" value="<?php echo e($diskusi->id); ?>">
                        <textarea name="message" rows="2" class="w-full border p-2 rounded" placeholder="Balas diskusi siswa..." required></textarea>
                        <button type="submit" class="mt-2 px-4 py-2 bg-green-600 text-white rounded">Balas</button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-500 mt-2">Belum ada diskusi untuk sub materi ini.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/diskusi/show.blade.php ENDPATH**/ ?>