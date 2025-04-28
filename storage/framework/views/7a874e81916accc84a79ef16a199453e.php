<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeIn">
        <h2 class="fw-bold text-primary"><i class="bi bi-list-task me-2"></i> Daftar Soal</h2>
        <a href="<?php echo e(route('teacher.quiz.create')); ?>" class="btn btn-success rounded-pill shadow-sm animate__animated animate__fadeInRight" style="animation-delay: 0.2s;">
            <i class="bi bi-plus-circle me-1"></i> Tambah Soal
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm animate__animated animate__fadeInUp" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-lg rounded-4 animate__animated animate__fadeIn">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">Pertanyaan</th>
                            <th scope="col" class="border-0">Level</th>
                            <th scope="col" class="border-0">Tipe Game</th>
                            <th scope="col" class="border-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="animate__animated animate__fadeIn" style="animation-delay: <?php echo e(0.1 * $loop->index + 0.3); ?>s;">
                                <td>
                                    <i class="bi bi-question-octagon-fill text-info me-2"></i>
                                    <?php echo e(Str::limit($soal->pertanyaan, 80)); ?>

                                    <?php if(strlen($soal->pertanyaan) > 80): ?>
                                        <span class="text-muted fst-italic">(...)</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-secondary rounded-pill"><i class="bi bi-tag me-1"></i> Level <?php echo e($soal->level); ?></span>
                                </td>
                                <td>
                                    <?php if($soal->tipe_game == 'petualangan'): ?>
                                        <span class="badge bg-primary rounded-pill"><i class="bi bi-compass me-1"></i> Petualangan Edukasi</span>
                                    <?php else: ?>
                                        <span class="badge bg-info rounded-pill"><i class="bi bi-people me-1"></i> Kuis Multiplayer</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="<?php echo e(route('teacher.quiz.edit', $soal->id)); ?>" class="btn btn-sm btn-outline-warning rounded-pill shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Soal">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="<?php echo e(route('teacher.quiz.destroy', $soal->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm" onclick="return confirm('Yakin ingin menghapus soal ini?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Soal">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/teacher/quiz/index.blade.php ENDPATH**/ ?>