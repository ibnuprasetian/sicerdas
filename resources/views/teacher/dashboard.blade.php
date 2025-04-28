@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-2xl shadow-xl px-8 py-10 max-w-7xl mx-auto space-y-10">

        <!-- Gambar Ilustrasi -->
        <div class="flex justify-center">
            <img src="{{ asset('images/wallpaper.png') }}" alt="Welcome Image"
                class="rounded-2xl shadow-lg w-full max-w-5xl">
        </div>

        <!-- Sambutan -->
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-indigo-800 mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 text-lg">Ayo mulai mengelola pembelajaran untuk siswa dengan lebih mudah.</p>
        </div>

        <!-- Grid Menu -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Kelola Materi -->
            <a href="{{ route('teacher.materi.index') }}"
                class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                <i class="fas fa-book text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                <h2 class="text-xl font-semibold text-indigo-800">Kelola Materi</h2>
                <p class="text-sm text-gray-600 mt-1">Tambah dan atur materi pembelajaran.</p>
            </a>

            <!-- Forum Diskusi -->
            <a href="{{ route('teacher.diskusi.index') }}"
                class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                <i class="fas fa-comments text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                <h2 class="text-xl font-semibold text-indigo-800">Forum Diskusi</h2>
                <p class="text-sm text-gray-600 mt-1">Pantau dan balas diskusi siswa.</p>
            </a>

            <!-- Buat Quiz -->
            <a href="{{ route('teacher.quiz.index') }}"
            class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                <i class="fas fa-question-circle text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                <h2 class="text-xl font-semibold text-indigo-800">Buat Quiz</h2>
                <p class="text-sm text-gray-600 mt-1">Buat Quiz untuk siswa</p>
            </a>

            <!-- Kelola User -->
            <a href="{{ route('teacher.users.index') }}"
                class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                <i class="fas fa-users text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                <h2 class="text-xl font-semibold text-indigo-800">Kelola User</h2>
                <p class="text-sm text-gray-600 mt-1">Lihat dan atur akun siswa dan guru.</p>
            </a>

            <!-- Profil -->
            <a href="{{ route('profile.edit') }}"
                class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                <i class="fas fa-user-cog text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                <h2 class="text-xl font-semibold text-indigo-800">Profil</h2>
                <p class="text-sm text-gray-600 mt-1">Ubah informasi akun Anda.</p>
            </a>

        </div>
    </div>
@endsection