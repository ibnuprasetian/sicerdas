<?php $__env->startSection('content'); ?>
<div class="container py-5" style="background-image: url('/images/bg-petualangan-selesai.jpg'); background-size: cover; background-position: center; background-attachment: fixed; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
    <div class="card shadow-lg border-0 rounded-4 p-5 animate__animated animate__fadeIn">
        <div class="text-center">
            <h2 class="display-4 fw-bold text-success animate__animated animate__bounceIn">🎉 Petualangan Selesai!</h2>
            <p class="fs-5 mt-3 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                Selamat, kamu telah menaklukkan Level <strong class="text-primary"><?php echo e($level); ?></strong> dalam petualangan yang luar biasa ini! <i class="bi bi-trophy-fill text-warning ms-2"></i>
            </p>
        </div>

        <div class="text-center my-4 animate__animated animate__fadeIn" style="animation-delay: 0.4s;">
            <h4 class="text-info"><i class="bi bi-star-fill text-warning me-2"></i> Total XP yang Kamu Raih: <span class="fw-bold text-success"><?php echo e($skor); ?></span></h4>
            <?php if(isset($xp_gain) && $xp_gain > 0): ?>
                <p class="text-success"><i class="bi bi-sparkles text-warning me-2"></i> Bonus XP untuk jawaban yang tepat: <strong class="text-info">+<?php echo e($xp_gain); ?></strong></p>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-center gap-3 flex-wrap mt-4 animate__animated animate__slideInUp" style="animation-delay: 0.6s;">
            <form method="POST" action="<?php echo e(route('quiz.petualangan.submitLevel')); ?>" class="animate__animated animate__pulse animate__infinite infinite">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-success btn-lg rounded-pill shadow-sm">
                    <i class="bi bi-arrow-right-circle-fill me-2"></i> Lanjut ke Level Berikutnya
                </button>
            </form>

            <a href="<?php echo e(route('quiz.petualangan.reset')); ?>" class="btn btn-warning btn-lg rounded-pill shadow-sm animate__animated animate__shakeX" style="animation-delay: 0.8s;">
                <i class="bi bi-arrow-clockwise me-2"></i> Mulai Ulang Petualangan
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
<style>
    body {
        background-image: url('/images/bg-petualangan.jpg'); /* Gunakan background utama petualangan */
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
    }
    .card {
        background: rgba(255, 255, 255, 0.9); /* Sedikit transparan */
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/quiz/petualangan_selesai.blade.php ENDPATH**/ ?>