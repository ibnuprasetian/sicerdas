<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4 display-4 fw-semibold">Kelola Materi</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?php echo e(route('teacher.materi.create')); ?>" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> Tambah Materi
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="list-group">
        <?php $__empty_1 = true; $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center shadow-sm mb-2 rounded">
                <div>
                    <h5 class="mb-1 fw-bold"><?php echo e($materi->judul); ?></h5>
                    <p class="text-muted mb-1 small"><?php echo e(Str::limit($materi->deskripsi, 100)); ?></p>
                    <?php if($materi->subMateris->isNotEmpty()): ?>
                        <ul class="list-unstyled small">
                            <?php $__currentLoopData = $materi->subMateris->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><i class="bi bi-file-earmark-text me-1"></i> <?php echo e($sub->judul); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($materi->subMateris->count() > 3): ?>
                                <li class="text-muted fst-italic small">+<?php echo $materi->subMateris->count() - 3; ?> lainnya</li>
                            <?php endif; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted small fst-italic">Tidak ada sub-materi</p>
                    <?php endif; ?>
                </div>
                <div>
                    <a href="<?php echo e(route('teacher.materi.edit', $materi->id)); ?>" class="btn btn-sm btn-warning me-2" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="<?php echo e(route('teacher.materi.destroy', $materi->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus materi ini?')" title="Hapus">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-info" role="alert">
                Tidak ada materi yang tersedia. Silakan tambahkan materi baru.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* A very common and clear sans-serif font */
            -webkit-font-smoothing: antialiased; /* Improve font rendering for smoother appearance */
        }

        h1, h2, h3, h4, h5, h6, .btn {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600; /* Slightly bolder for headings and buttons */
        }

        .list-group-item h5 {
            font-weight: 700; /* Make the material title stand out more */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/materi/index.blade.php ENDPATH**/ ?>