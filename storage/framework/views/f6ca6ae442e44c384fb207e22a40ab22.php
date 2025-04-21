<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4 display-4 fw-semibold text-gray-800">Edit Materi</h1>

    <form action="<?php echo e(route('teacher.materi.update', $materi->id)); ?>" method="POST" class="bg-white rounded-lg shadow-md p-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-4">
            <label for="judul" class="form-label fw-medium">Judul Materi <span class="text-danger">*</span></label>
            <input type="text" name="judul" id="judul" class="form-control form-control-lg" value="<?php echo e($materi->judul); ?>" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="form-label fw-medium">Deskripsi Materi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?php echo e($materi->deskripsi); ?></textarea>
        </div>

        <hr class="my-5">
        <h5 class="mb-4 fw-semibold text-gray-700">Sub Materi</h5>
        <div id="submateri-wrapper">
            <?php $__currentLoopData = $materi->subMateris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="submateri-group mb-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="sub_judul_<?php echo e($loop->index); ?>" class="form-label fw-medium">Judul Sub Materi <span class="text-danger">*</span></label>
                            <input type="text" name="sub_judul[]" id="sub_judul_<?php echo e($loop->index); ?>" value="<?php echo e($sub->judul); ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="youtube_link_<?php echo e($loop->index); ?>" class="form-label fw-medium">Link YouTube <span class="text-danger">*</span></label>
                            <input type="text" name="youtube_link[]" id="youtube_link_<?php echo e($loop->index); ?>" value="<?php echo e($sub->youtube_link); ?>" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="sub_deskripsi_<?php echo e($loop->index); ?>" class="form-label fw-medium">Deskripsi Sub Materi</label>
                            <textarea name="sub_deskripsi[]" id="sub_deskripsi_<?php echo e($loop->index); ?>" class="form-control" rows="2"><?php echo e($sub->deskripsi); ?></textarea>
                        </div>
                         <div class="col-12 text-end">
                            <button type="button" class="btn btn-outline-danger btn-sm remove-submateri" onclick="removeSubmateri(this)">
                                <i class="bi bi-trash3"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button type="button" class="btn btn-secondary mb-4" onclick="tambahSubmateri()">
            <i class="bi bi-plus-circle me-2"></i> Tambah Sub Materi
        </button>

        <div class="text-end">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-save me-2"></i> Update Materi
            </button>
        </div>
    </form>
</div>

<script>
function tambahSubmateri() {
    const wrapper = document.getElementById('submateri-wrapper');
    const group = document.createElement('div');
    group.className = 'submateri-group mb-4 p-4 rounded-lg bg-gray-50 border border-gray-200'; // Added border
    group.innerHTML = `
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-medium">Judul Sub Materi <span class="text-danger">*</span></label>
                <input type="text" name="sub_judul[]" class="form-control" placeholder="Judul Sub Materi" required>
            </div>
            <div class="col-md-6">
                 <label class="form-label fw-medium">Link YouTube <span class="text-danger">*</span></label>
                <input type="text" name="youtube_link[]" class="form-control" placeholder="Link YouTube" required>
            </div>
            <div class="col-12">
                <label class="form-label fw-medium">Deskripsi Sub Materi</label>
                <textarea name="sub_deskripsi[]" class="form-control" placeholder="Deskripsi Sub Materi" rows="2"></textarea>
            </div>
            <div class="col-12 text-end">
                <button type="button" class="btn btn-outline-danger btn-sm remove-submateri" onclick="removeSubmateri(this)">
                    <i class="bi bi-trash3"></i> Hapus
                </button>
            </div>
        </div>
    `;
    wrapper.appendChild(group);
}

function removeSubmateri(buttonElement) {
    buttonElement.closest('.submateri-group').remove();
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/teacher/materi/edit.blade.php ENDPATH**/ ?>