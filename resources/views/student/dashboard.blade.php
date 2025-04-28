@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div class="bg-white rounded-2xl shadow-xl px-6 py-10 space-y-10">

            <!-- Gambar Wallpaper dalam Box -->
            <div class="flex justify-center">
                <img src="{{ asset('images/wallpaper.png') }}" alt="Welcome Image"
                    class="rounded-2xl shadow-md w-full max-w-5xl">
            </div>

            <!-- Teks Sambutan -->
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-indigo-700">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="mt-2 text-lg text-gray-600">Silakan lanjutkan belajar melalui menu berikut:</p>
            </div>

            <!-- Menu Navigasi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Menu Materi -->
                <a href="{{ route('student.materi.index') }}"
                    class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow flex flex-col items-center text-center">
                    <i class="fas fa-book text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                    <p class="text-xl font-semibold text-indigo-800">Materi</p>
                    <p class="text-sm text-gray-600 mt-1">Lihat dan pelajari materi kursus</p>
                </a>

                <!-- Menu Quiz -->
                <a href="{{ route('quiz.petualangan.map') }}"
                    class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow flex flex-col items-center text-center">
                    <i class="fas fa-book text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                    <p class="text-xl font-semibold text-indigo-800">Quiz</p>
                    <p class="text-sm text-gray-600 mt-1">Lihat dan kerjakan quiz sekarang</p>
                </a>

                <!-- Menu Profil -->
                <a href="{{ route('profile.edit') }}"
                    class="group bg-indigo-50 hover:bg-indigo-100 transition p-6 rounded-2xl shadow flex flex-col items-center text-center">
                    <i
                        class="fas fa-user-circle text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i>
                    <p class="text-xl font-semibold text-indigo-800">Profil</p>
                    <p class="text-sm text-gray-600 mt-1">Lihat dan ubah informasi akun</p>
                </a>
            </div>

        </div>
    </div>
@endsection