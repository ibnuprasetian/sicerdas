<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Kelola User</h2>
        <a href="<?php echo e(route('teacher.users.create')); ?>" class="btn btn-primary">+ Tambah User</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <span class="badge <?php echo e($user->role == 1 ? 'bg-info' : 'bg-success'); ?>">
                                <?php echo e($user->role == 1 ? 'Guru' : 'Siswa'); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('teacher.users.edit', $user)); ?>" class="btn btn-sm btn-warning">Edit</a>

                            <form action="<?php echo e(route('teacher.users.destroy', $user)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data user.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/users/index.blade.php ENDPATH**/ ?>