<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Materi Tersedia</h1>

    <div class="flex justify-between items-center mb-6">
        <form action="<?php echo e(route('student.materi.index')); ?>" method="GET" class="w-full md:w-1/2 lg:w-1/3">
            <div class="relative rounded-full shadow-md overflow-hidden focus-within:shadow-lg transition-shadow duration-300">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari Materi..."
                    class="w-full pl-5 pr-10 py-2 rounded-full border-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-auto">
                    <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div
            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
            x-data="{ open: false }"
        >
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2 text-gray-700"><?php echo e($materi->judul); ?></h2>
                <p class="text-gray-500 text-sm mb-3 truncate"><?php echo e($materi->deskripsi ?? 'Tidak ada deskripsi singkat.'); ?></p>
                <div class="flex justify-between items-center">
                    <a href="<?php echo e(route('student.materi.show', $materi->id)); ?>"
                       class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 transition-colors duration-200">
                        Lihat Materi
                    </a>
                    <button @click="open = ! open" class="text-gray-400 hover:text-gray-600 focus:outline-none transition-colors duration-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-full">
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Pemberitahuan!</strong>
                <span class="block sm:inline">Tidak ada materi yang tersedia saat ini.</span>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sicerdas\resources\views/student/materi/index.blade.php ENDPATH**/ ?>