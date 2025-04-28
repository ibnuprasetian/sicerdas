<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
            <i class="fas fa-comments text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
            Forum Diskusi Siswa
        </h1>

        <ul class="space-y-4">
            <?php $__empty_1 = true; $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out animate__animated animate__fadeInUp"
                    style="animation-delay: <?php echo e(0.1 * $loop->index); ?>s;">
                    <a href="<?php echo e(route('teacher.diskusi.show', $materi->id)); ?>"
                        class="block p-4 text-blue-600 font-semibold text-lg hover:text-blue-800">
                        <div class="flex items-center">
                            <i class="fas fa-book-open text-indigo-400 mr-3 text-xl"></i>
                            <span><?php echo e($materi->judul); ?></span>
                            <?php if($materi->diskusis_count > 0): ?>
                                <span class="ml-auto bg-green-200 text-green-700 rounded-full px-2 py-1 text-sm font-semibold">
                                    <i class="fas fa-comment-dots mr-1"></i> <?php echo e($materi->diskusis_count); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="bg-gray-100 p-4 rounded shadow">
                    <p class="text-gray-600 italic">Belum ada materi untuk diskusi.</p>
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .container {
            max-width: 768px;
            margin: 0 auto;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/diskusi/index.blade.php ENDPATH**/ ?>