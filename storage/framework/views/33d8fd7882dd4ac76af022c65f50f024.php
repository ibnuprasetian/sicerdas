<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>SiCerdas</title>
    <link rel="icon" href="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>

    <!-- AOS CSS & JS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="font-sans text-gray-900 antialiased bg-blue-50">

    <script>
        AOS.init();
    </script>

    <!-- Navbar -->
    <nav class="bg-blue-700 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="<?php echo e(asset('images/LogoSiCerdas.png')); ?>" alt="Si Cerdas Logo" class="w-10 h-10">
                <img src="<?php echo e(asset('images/TextSiCerdas.png')); ?>" alt="Si Cerdas Text" class="h-8">
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="w-full bg-blue-50 py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center gap-12">
            <!-- Teks Sambutan -->
            <div class="w-full lg:w-1/2 text-center lg:text-left space-y-6" data-aos="fade-right">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-blue-800 leading-tight">Selamat Datang di</h1>
                <h1 class="text-4xl lg:text-5xl font-extrabold text-blue-800 leading-tight"><span class="text-indigo-700">Si Cerdas</span></h1>
                <p class="text-lg text-gray-600 leading-relaxed">Platform pembelajaran modern untuk siswa SMP. Jelajahi materi, ikuti diskusi, dan dapatkan pengalaman belajar terbaik!</p>
                <div class="flex flex-col sm:flex-row sm:justify-start justify-center gap-4 mt-6">
                    <a href="<?php echo e(route('login')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition shadow">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-white border border-blue-600 text-blue-600 hover:bg-blue-100 font-semibold px-6 py-3 rounded-lg transition shadow">Daftar</a>
                </div>
            </div>

            <!-- Gambar -->
            <div class="w-full lg:w-1/2" data-aos="fade-left">
                <img src="<?php echo e(asset('images/wallpaper.png')); ?>" alt="Welcome Image" class="rounded-xl w-full object-cover shadow-xl max-h-[480px]">
            </div>
        </div>
    </section>

    <!-- Section Fitur -->
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold text-blue-700 mb-10" data-aos="zoom-in">Apa yang Bisa Kamu Lakukan di Si Cerdas?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-left">
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-book text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-800">Materi Interaktif</h3>
                    <p class="text-gray-600">Akses materi lengkap dan sesuai kurikulum. Dipandu dengan video dan teks.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-comments text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-800">Forum Diskusi</h3>
                    <p class="text-gray-600">Berdiskusi langsung dengan guru atau teman tentang materi.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-book text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-800">Game</h3>
                    <p class="text-gray-600">Mengerjakan soal menjadi lebih seru.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-xl shadow hover:shadow-md transition" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-user-astronaut text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-800">Avatar Kustom</h3>
                    <p class="text-gray-600">Pilih avatar yang sesuai dengan karaktermu, dari manusia hingga hewan yang lucu!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section class="bg-blue-100 py-20 px-4">
        <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-blue-800 mb-6">Tentang Kami</h2>
            <p class="text-gray-700 text-lg leading-relaxed max-w-3xl mx-auto">
                Si Cerdas adalah platform pembelajaran digital yang dibuat untuk siswa SMP. 
                Kami menghadirkan metode belajar yang modern, menyenangkan, dan relevan dengan dunia industri. 
                Visi kami adalah membentuk generasi muda yang siap kerja dan terus berkembang di era digital.
            </p>
        </div>
    </section>

    <!-- Mengapa Memilih Si Cerdas -->
    <section class="bg-white py-20 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-blue-700 mb-10" data-aos="fade-up">Mengapa Memilih Si Cerdas?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-6 rounded-xl bg-blue-50 shadow hover:shadow-md" data-aos="zoom-in" data-aos-delay="100">
                    <i class="fas fa-laptop-code text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-lg font-semibold text-blue-800">Seru dan interaktif</h3>
                    <p class="text-gray-600">Belajar melalui pembelajaran video dan game.</p>
                </div>
                <div class="p-6 rounded-xl bg-blue-50 shadow hover:shadow-md" data-aos="zoom-in" data-aos-delay="200">
                    <i class="fas fa-users text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-lg font-semibold text-blue-800">Kemudahan Diskusi</h3>
                    <p class="text-gray-600">Didukung diskusi bersama dan pengajar yang saling membantu.</p>
                </div>
                <div class="p-6 rounded-xl bg-blue-50 shadow hover:shadow-md" data-aos="zoom-in" data-aos-delay="300">
                    <i class="fas fa-bolt text-3xl text-indigo-600 mb-4"></i>
                    <h3 class="text-lg font-semibold text-blue-800">Akses Cepat</h3>
                    <p class="text-gray-600">Mudah diakses kapan saja, di mana saja dengan perangkat apapun.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-indigo-600 text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4">Gabung Sekarang dan Jadi Bagian dari Si Cerdas!</h2>
            <p class="text-lg mb-6">Mulailah perjalanan belajarmu bersama komunitas siswa SMP yang antusias dan kreatif.</p>
            <a href="<?php echo e(route('register')); ?>" class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-indigo-100 transition">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-6 text-center px-4 relative z-10">
        <p>&copy; <?php echo e(date('Y')); ?> Si Cerdas. Semua Hak Dilindungi.</p>
    </footer>

</body>
</html>
<?php /**PATH C:\laragon\www\sicerdas\resources\views/welcome.blade.php ENDPATH**/ ?>