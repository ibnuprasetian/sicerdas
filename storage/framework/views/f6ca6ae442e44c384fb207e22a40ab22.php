<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
            <i class="text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
            Edit Materi
        </h1>

        <form action="<?php echo e(route('teacher.materi.update', $materi->id)); ?>" method="POST"
            class="bg-white rounded-lg shadow-lg p-4 p-md-5 animate__animated animate__fadeIn">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label for="judul" class="form-label fw-semibold"><i class="bi bi-bookmark-fill me-2 text-info"></i> Judul
                    Materi <span class="text-danger">*</span></label>
                <input type="text" name="judul" id="judul" class="form-control form-control-lg rounded-pill"
                    value="<?php echo e($materi->judul); ?>" required placeholder="Masukkan judul materi">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label fw-semibold"><i
                        class="bi bi-file-earmark-richtext-fill me-2 text-secondary"></i> Deskripsi Materi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control rounded-lg" rows="3"
                    placeholder="Jelaskan materi secara singkat"><?php echo e($materi->deskripsi); ?></textarea>
            </div>

            <hr class="my-5 border-primary">
            <h5 class="mb-4 fw-semibold text-primary"><i class="bi bi-list-ul me-2"></i> Sub Materi</h5>

            <div id="submateri-wrapper">
                <?php $__currentLoopData = $materi->subMateris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="submateri-group mb-4 p-3 rounded-lg bg-light border border-gray-200 animate__animated animate__slideInLeft"
                        style="animation-delay: <?php echo e(0.1 * $index); ?>s;">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label for="sub_judul_<?php echo e($index); ?>" class="form-label fw-semibold"><i
                                        class="bi bi-textarea-resize me-2 text-warning"></i> Judul Sub Materi <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="sub_judul[]" id="sub_judul_<?php echo e($index); ?>" value="<?php echo e($sub->judul); ?>"
                                    class="form-control rounded-pill" placeholder="Judul Sub Materi" required>
                            </div>
                            <div class="col-md-6">
                                <label for="youtube_link_<?php echo e($index); ?>" class="form-label fw-semibold"><i
                                        class="bi bi-youtube me-2 text-danger"></i> Link YouTube <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="youtube_link[]" id="youtube_link_<?php echo e($index); ?>"
                                    value="<?php echo e($sub->youtube_link); ?>" class="form-control rounded-pill"
                                    placeholder="Link YouTube" required>
                            </div>
                            <div class="col-12">
                                <label for="sub_deskripsi_<?php echo e($index); ?>" class="form-label fw-semibold"><i
                                        class="bi bi-paragraph me-2 text-info"></i> Deskripsi Sub Materi</label>
                                <textarea name="sub_deskripsi[]" id="sub_deskripsi_<?php echo e($index); ?>" class="form-control rounded-lg"
                                    placeholder="Deskripsi Sub Materi" rows="2"><?php echo e($sub->deskripsi); ?></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-pill remove-submateri"
                                    onclick="removeSubmateri(this)">
                                    <i class="bi bi-trash3-fill"></i> Hapus
                                </button>
                            </div>
                            <input type="hidden" name="old_sub_id[]" value="<?php echo e($sub->id); ?>">
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <button type="button"
                class="btn btn-outline-primary rounded-pill mb-4 animate__animated animate__pulse animate__infinite"
                onclick="tambahSubmateri()">
                <i class="bi bi-plus-circle-fill me-2"></i> Tambah Sub Materi
            </button>

            <div class="text-end mt-4 animate__animated animate__fadeInUp">
                <button type="submit" class="btn btn-success btn-lg rounded-pill shadow-sm">
                    <i class="bi bi-save-fill me-2"></i> Update Materi
                </button>
            </div>
        </form>
    </div>

    <script>
        function tambahSubmateri() {
            const wrapper = document.getElementById('submateri-wrapper');
            const group = document.createElement('div');
            group.className = 'submateri-group mb-4 p-3 rounded-lg bg-light border border-gray-200 animate__animated animate__slideInLeft';
            group.innerHTML = `
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label class="form-label fw-semibold"><i class="bi bi-textarea-resize me-2 text-warning"></i> Judul Sub Materi <span class="text-danger">*</span></label>
                    <input type="text" name="sub_judul[]" class="form-control rounded-pill" placeholder="Judul Sub Materi" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold"><i class="bi bi-youtube me-2 text-danger"></i> Link YouTube <span class="text-danger">*</span></label>
                    <input type="text" name="youtube_link[]" class="form-control rounded-pill" placeholder="Link YouTube" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold"><i class="bi bi-paragraph me-2 text-info"></i> Deskripsi Sub Materi</label>
                    <textarea name="sub_deskripsi[]" class="form-control rounded-lg" placeholder="Deskripsi Sub Materi" rows="2"></textarea>
                </div>
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill remove-submateri" onclick="removeSubmateri(this)">
                        <i class="bi bi-trash3-fill"></i> Hapus
                    </button>
                </div>
            </div>
        `;
            wrapper.appendChild(group);
        }

        function removeSubmateri(buttonElement) {
            const groupToRemove = buttonElement.closest('.submateri-group');
            groupToRemove.classList.remove('animate__slideInLeft');
            groupToRemove.classList.add('animate__fadeOut');
            groupToRemove.addEventListener('animationend', () => {
                groupToRemove.remove();
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .form-label i {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/materi/edit.blade.php ENDPATH**/ ?>