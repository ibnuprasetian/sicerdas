<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg rounded-4 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white py-3 text-center">
                    <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i> Tambah User Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo e(route('teacher.users.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person-circle me-2 text-info"></i> Nama
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="name" class="form-control form-control-lg rounded-end" value="<?php echo e(old('name')); ?>" required placeholder="Masukkan nama">
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3" style="animation-delay: 0.1s;">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill me-2 text-secondary"></i> Email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control form-control-lg rounded-end" value="<?php echo e(old('email')); ?>" required placeholder="Masukkan email">
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3" style="animation-delay: 0.2s;">
                            <label for="role" class="form-label fw-semibold">
                                <i class="bi bi-tag-fill me-2 text-warning"></i> Role
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-person-badge-fill"></i>
                                </span>
                                <select name="role" class="form-select form-select-lg rounded-end" required>
                                    <option value="1" <?php echo e(old('role') == 1 ? 'selected' : ''); ?>>Guru</option>
                                    <option value="2" <?php echo e(old('role') == 2 ? 'selected' : ''); ?>>Siswa</option>
                                </select>
                            </div>
                            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3" style="animation-delay: 0.3s;">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-key-fill me-2 text-success"></i> Password Awal
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" name="password" class="form-control form-control-lg rounded-end" required placeholder="Masukkan password awal">
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4" style="animation-delay: 0.4s;">
                            <a href="<?php echo e(route('teacher.users.index')); ?>" class="btn btn-outline-secondary rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill">
                                <i class="bi bi-person-plus-fill me-1"></i> Simpan User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <style>
        .bg-gradient-primary {
            background: linear-gradient(to right, #007bff, #6610f2);
        }
        .form-label i {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/users/create.blade.php ENDPATH**/ ?>