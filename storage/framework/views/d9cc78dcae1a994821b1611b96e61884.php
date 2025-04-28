<?php $__env->startSection('content'); ?>
<div class="container py-5" style="background-image: url('/images/bg-petualangan.jpg'); background-size: cover; background-position: center; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.3);">
    <h2 class="mb-5 text-center text-white text-shadow display-5 animate__animated animate__fadeInDown">🗺️ Peta Petualangan Edukasi</h2>
    <div class="row g-4 justify-content-center animate__animated animate__fadeIn">
        <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $is_unlocked = in_array($level, $progress) || $user->level == $level;
                $is_done = in_array($level, $progress);
                $icons = ['🏕️','🏞️','🌋','🏰','🏜️','🏝️','🌲','🗿','🌌','🧭'];
                $icon = $icons[($level - 1) % count($icons)];
            ?>

            <div class="col-6 col-md-3 col-lg-2 animate__animated animate__fadeInUp" style="animation-delay: <?php echo e(0.1 * $loop->index); ?>s;">
                <div class="card level-card text-center <?php echo e($is_unlocked ? '' : 'locked'); ?> <?php echo e($user->level == $level ? 'current animate__animated animate__pulse animate__infinite infinite' : ''); ?>">
                    <div class="card-body py-4">
                        <h5 class="card-title mb-2" style="font-size: 1.2rem;"><?php echo e($icon); ?><br>Level <?php echo e($level); ?></h5>
                        <div class="mb-2">
                            <?php if($is_done): ?>
                                <span class="badge bg-success rounded-pill"><i class="bi bi-check-circle-fill me-1"></i> Selesai</span>
                            <?php elseif($user->level == $level): ?>
                                <span class="badge bg-warning text-dark rounded-pill"><i class="bi bi-play-fill me-1"></i> Sedang</span>
                            <?php else: ?>
                                <span class="badge bg-secondary rounded-pill"><i class="bi bi-lock-fill me-1"></i> Terkunci</span>
                            <?php endif; ?>
                        </div>
                        <?php if($user->level == $level): ?>
                            <a href="<?php echo e(route('quiz.petualangan.index')); ?>" class="btn btn-play mt-2 btn-sm rounded-pill shadow-sm"><i class="bi bi-play me-1"></i> Mainkan</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="mt-5 text-center animate__animated animate__fadeIn">
    <form method="POST" action="<?php echo e(route('quiz.petualangan.reset')); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn btn-danger btn-lg rounded-pill shadow"><i class="bi bi-arrow-clockwise me-2"></i> Mulai Ulang dari Level 1</button>
    </form>
</div>

<?php if(session('level_up')): ?>
<div id="levelUpPopup" class="popup-wrapper" style="display: none;">
    <div class="text-center bg-white p-5 rounded shadow-lg animate__animated animate__bounceIn">
        <h2 class="mb-3"><i class="bi bi-star-fill text-warning me-2"></i> Level Naik!</h2>
        <p class="lead">Selamat! Kamu telah mencapai level berikutnya! <span style="font-size: 1.5em;">🚀</span></p>
        <button id="btn-close-popup" type="button" class="btn btn-success mt-3 rounded-pill"><i class="bi bi-check-lg me-1"></i> Lanjutkan</button>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.text-shadow {
    text-shadow: 2px 2px 6px rgba(0,0,0,0.8);
}
.level-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: linear-gradient(145deg, #f0f0f0, #dcdcdc);
    border-radius: 12px;
    box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff; /* Lebih halus */
}
.level-card:hover {
    transform: translateY(-8px); /* Lebih terasa */
    box-shadow: 0 12px 24px rgba(0,0,0,0.15); /* Lebih menonjol */
}
.level-card.locked {
    opacity: 0.6; /* Sedikit lebih terlihat */
    filter: grayscale(80%); /* Efek abu-abu */
    pointer-events: none;
}
.level-card.current {
    border: 3px solid #28a745;
    box-shadow: 0 0 15px rgba(40,167,69,0.7); /* Lebih bercahaya */
}
.btn-play {
    background: linear-gradient(to right, #00c9ff, #92fe9d);
    border: none;
    color: #000;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Transisi lebih halus */
}
.btn-play:hover {
    transform: scale(1.08); /* Lebih besar saat dihover */
    box-shadow: 0 5px 10px rgba(0,0,0,0.2); /* Efek hover lebih jelas */
}
.popup-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
}
.text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.6); /* Sedikit disesuaikan */
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
<?php if(session('level_up')): ?>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const levelUpPopup = document.getElementById('levelUpPopup');
        const closePopupButton = document.getElementById('btn-close-popup');

        if (levelUpPopup) {
            levelUpPopup.style.display = 'flex';
            confetti(); // Aktifkan confetti saat level naik

            closePopupButton.addEventListener('click', function() {
                levelUpPopup.style.display = 'none';
            });
        }
    });
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/quiz/petualangan_map.blade.php ENDPATH**/ ?>