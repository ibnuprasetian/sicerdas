<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow-lg rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-primary text-white py-3">
            <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i> Tambah Soal Baru</h4>
        </div>
        <div class="card-body p-4">
            <form action="<?php echo e(route('teacher.quiz.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3 animate__animated animate__fadeIn">
                    <label for="pertanyaan" class="form-label"><i class="bi bi-question-circle me-2"></i> Pertanyaan</label>
                    <input type="text" name="pertanyaan" class="form-control form-control-lg rounded-pill" required placeholder="Masukkan pertanyaan...">
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.1s;">
                    <label for="level" class="form-label"><i class="bi bi-bar-chart-line me-2"></i> Level</label>
                    <select name="level" class="form-select form-select-lg rounded-pill" required>
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                        <option value="5">Level 5</option>
                        <option value="6">Level 6</option>
                        <option value="7">Level 7</option>
                        <option value="8">Level 8</option>
                        <option value="9">Level 9</option>
                        <option value="10">Level 10</option>
                    </select>
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.2s;">
                    <label for="opsi_a" class="form-label"><i class="bi bi-option me-2"></i> Opsi A</label>
                    <input type="text" name="opsi_a" class="form-control form-control-lg rounded-pill" required placeholder="Jawaban pilihan A">
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.3s;">
                    <label for="opsi_b" class="form-label"><i class="bi bi-option me-2"></i> Opsi B</label>
                    <input type="text" name="opsi_b" class="form-control form-control-lg rounded-pill" required placeholder="Jawaban pilihan B">
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.4s;">
                    <label for="opsi_c" class="form-label"><i class="bi bi-option me-2"></i> Opsi C</label>
                    <input type="text" name="opsi_c" class="form-control form-control-lg rounded-pill" required placeholder="Jawaban pilihan C">
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.5s;">
                    <label for="opsi_d" class="form-label"><i class="bi bi-option me-2"></i> Opsi D</label>
                    <input type="text" name="opsi_d" class="form-control form-control-lg rounded-pill" required placeholder="Jawaban pilihan D">
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.6s;">
                    <label for="jawaban_benar" class="form-label"><i class="bi bi-check-circle-fill text-success me-2"></i> Jawaban Benar</label>
                    <select name="jawaban_benar" class="form-select form-select-lg rounded-pill" required>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>

                <div class="mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.7s;">
                    <label for="tipe_game" class="form-label"><i class="bi bi-joystick me-2"></i> Tipe Game</label>
                    <select name="tipe_game" class="form-select form-select-lg rounded-pill" required>
                        <option value="petualangan">Petualangan</option>
                        <option value="multiplayer">Multiplayer</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-4 animate__animated animate__fadeIn" style="animation-delay: 0.8s;">
                    <a href="<?php echo e(route('teacher.quiz.index')); ?>" class="btn btn-outline-secondary rounded-pill me-2"><i class="bi bi-arrow-left me-1"></i> Batal</a>
                    <button type="submit" class="btn btn-success rounded-pill"><i class="bi bi-save me-1"></i> Simpan Soal</button>
                </div>
            </form>
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
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sicerdas\resources\views/teacher/quiz/create.blade.php ENDPATH**/ ?>