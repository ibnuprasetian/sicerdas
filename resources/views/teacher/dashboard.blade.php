@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <h1 class="text-3xl font-semibold mb-4">
            Selamat Datang, {{ Auth::user()->name }} di Dashboard Guru
        </h1>

        <!-- Gambar Ilustrasi -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/wallpaper.png') }}" alt="Welcome Image" class="w-120 h-90">
        </div>
    </div>
@endsection
