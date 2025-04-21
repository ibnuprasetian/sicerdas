<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Tambah User Baru</h2>
    <form action="<?php echo e(route('teacher.users.store')); ?>" method="POST" class="mt-3">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="1">Guru</option>
                <option value="2" selected>Siswa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Awal</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <a href="<?php echo e(route('teacher.users.index')); ?>" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/users/create.blade.php ENDPATH**/ ?>