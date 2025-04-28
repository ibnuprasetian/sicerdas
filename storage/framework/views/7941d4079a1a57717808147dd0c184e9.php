<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeInDown">
            <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
                <i class="fas fa-users text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                Kelola Pengguna
            </h1>
            <a href="<?php echo e(route('teacher.users.create')); ?>"
                class="btn btn-success rounded-pill shadow-sm animate__animated animate__fadeInRight">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Pengguna
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm animate__animated animate__slideInDown"
                role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-lg rounded-4 animate__animated animate__fadeIn">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col" class="border-0"><i class="bi bi-person-circle me-1"></i> Nama</th>
                                <th scope="col" class="border-0"><i class="bi bi-envelope-fill me-1"></i> Email</th>
                                <th scope="col" class="border-0 text-center"><i class="bi bi-tag-fill me-1"></i> Role</th>
                                <th scope="col" class="border-0 text-center"><i class="bi bi-gear-fill me-1"></i> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="animate__animated animate__fadeIn"
                                    style="animation-delay: <?php echo e(0.05 * $loop->index + 0.3); ?>s;">
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill <?php echo e($user->role == 1 ? 'bg-info' : 'bg-success'); ?>">
                                            <?php echo e($user->role == 1 ? 'Guru' : 'Siswa'); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?php echo e(route('teacher.users.edit', $user)); ?>"
                                                class="btn btn-sm btn-outline-warning rounded-pill shadow-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Pengguna">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="<?php echo e(route('teacher.users.destroy', $user)); ?>" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-outline-danger rounded-pill shadow-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pengguna">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-3">
                                        <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i> Belum ada data
                                        pengguna.
                                    </td>
                                </tr>
                            <?php endif; ?>
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
    <style>
        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: white;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
            /* Efek hover lembut */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/users/index.blade.php ENDPATH**/ ?>