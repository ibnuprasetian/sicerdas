<?php $__env->startSection('content'); ?>
<div class="container py-8">
    <a href="<?php echo e(route('teacher.diskusi.index')); ?>" class="text-sm text-blue-500 hover:underline mb-4 inline-flex items-center animate__animated animate__fadeIn">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Materi
    </a>

    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
        <i class="fas fa-comments text-indigo-500 mr-2"></i> Diskusi: <span class="text-gray-800"><?php echo e($materi->judul); ?></span>
    </h1>

    <div class="space-y-8">
        <?php $__currentLoopData = $materi->subMateris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500 animate__animated animate__fadeInUp" style="animation-delay: <?php echo e(0.1 * $loop->index); ?>s;">
                <h2 class="text-xl font-semibold text-gray-800 mb-3"><i class="fas fa-file-alt text-indigo-400 mr-2"></i> <?php echo e($sub->judul); ?></h2>

                <?php $__empty_1 = true; $__currentLoopData = $sub->discussions->where('parent_id', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diskusi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-gray-50 p-4 rounded-md shadow-sm mt-4 border border-gray-200 animate__animated animate__fadeIn" style="animation-delay: <?php echo e(0.1 * $loop->parent->index + 0.1 * $loop->index + 0.2); ?>s;">
                        <div class="flex items-start mb-2">
                            <i class="fas fa-user-circle text-blue-500 mr-2 text-lg"></i>
                            <p class="text-blue-700 font-semibold"><?php echo e($diskusi->user->name); ?>:</p>
                        </div>
                        <p class="mb-2 text-gray-700"><?php echo e($diskusi->message); ?></p>

                        <div class="space-y-2 ml-6">
                            <?php $__currentLoopData = $diskusi->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bg-gray-100 p-3 rounded-md border border-gray-200 animate__animated animate__fadeIn" style="animation-delay: <?php echo e(0.1 * $loop->parent->parent->index + 0.1 * $loop->parent->index + 0.1 * $loop->index + 0.3); ?>s;">
                                    <div class="flex items-start mb-1">
                                        <i class="fas fa-chalkboard-teacher text-green-500 mr-2 text-lg"></i>
                                        <p class="text-green-700 font-semibold"><?php echo e($reply->user->name); ?> (Guru):</p>
                                    </div>
                                    <p class="text-gray-700"><?php echo e($reply->message); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <form action="<?php echo e(route('teacher.discussions.reply')); ?>" method="POST" class="mt-3 ml-6 animate__animated animate__fadeIn" style="animation-delay: <?php echo e(0.1 * $loop->parent->parent->index + 0.1 * $loop->parent->index + 0.4); ?>s;">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="parent_id" value="<?php echo e($diskusi->id); ?>">
                            <textarea name="message" rows="2" class="w-full border p-2 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Balas diskusi siswa..." required></textarea>
                            <button type="submit" class="mt-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1">Balas</button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 mt-3 italic">Belum ada diskusi untuk sub materi ini.</p>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .container {
            max-width: 768px;
            margin: 0 auto;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/diskusi/show.blade.php ENDPATH**/ ?>