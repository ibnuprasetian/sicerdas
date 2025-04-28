<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="row justify-content-center">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="text-lg font-semibold mb-3 text-blue-600">Informasi Pengguna</h5>
                    <p>
                        <strong class="text-gray-700">Nama:</strong>
                        <span class="font-medium"><?php echo e(Auth::user()->name); ?></span>
                    </p>
                    <p>
                        <strong class="text-gray-700">Email:</strong>
                        <span class="font-medium"><?php echo e(Auth::user()->email); ?></span>
                    </p>
                    <?php if(Auth::user()->role == 1): ?>
                        <p>
                            <strong class="text-gray-700">Role:</strong>
                            <span class="font-medium text-green-600">Guru</span>
                        </p>
                    <?php else: ?>
                        <p>
                            <strong class="text-gray-700">Role:</strong>
                            <span class="font-medium text-purple-600">Siswa</span>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5>Ubah Profil</h5>
                    <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', Auth::user()->name)); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', Auth::user()->email)); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5>Ubah Password</h5>
                    <form method="POST" action="<?php echo e(route('password.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm mb-5">
                <div class="card-body">
                    <h5 class="text-danger">Hapus Akun</h5>
                    <p class="text-muted">Akun akan dihapus secara permanen.</p>

                    <form method="POST" action="<?php echo e(route('profile.destroy')); ?>" onsubmit="return confirm('Yakin ingin menghapus akun?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/profile/edit.blade.php ENDPATH**/ ?>