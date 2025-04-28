@extends('layouts.app')

@section('content')
<div class="container py-5" style="background-image: url('/images/bg-quiz.jpg'); background-size: cover; background-position: center; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.3);">
    <div class="card shadow-lg p-4 rounded-lg animate__animated animate__fadeIn">
        <h4 class="text-center text-primary mb-4 animate__animated animate__fadeInDown">
            <i class="bi bi-stars me-2"></i> Level {{ $user->level }} - Petualangan Edukasi
        </h4>
        <div class="d-flex justify-content-between align-items-center mb-3 animate__animated animate__fadeIn" style="animation-delay: 0.2s;">
            <span class="text-muted"><i class="bi bi-award-fill text-warning me-1"></i> XP Saat Ini: <span class="fw-bold">{{ $user->xp }}</span></span>
            <span class="text-muted"><i class="bi bi-question-circle-fill text-info me-1"></i> Jawab semua pertanyaan dengan benar!</span>
        </div>

        <form method="POST" action="{{ route('quiz.petualangan.submit') }}" class="animate__animated animate__fadeIn" style="animation-delay: 0.3s;">
            @csrf

            @foreach ($soals as $index => $soal)
                <input type="hidden" name="soal_id[]" value="{{ $soal->id }}">
                <div class="mb-4 p-3 rounded border animate__animated animate__slideInLeft" style="animation-delay: {{ 0.1 * $index + 0.4 }}s;">
                    <strong class="fs-5 text-dark"><i class="bi bi-question-octagon-fill text-info me-2"></i> {{ $index + 1 }}. {{ $soal->pertanyaan }}</strong>
                    <hr class="my-2">
                    @foreach (['opsi_a' => 'A', 'opsi_b' => 'B', 'opsi_c' => 'C', 'opsi_d' => 'D'] as $key => $label)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jawaban[{{ $soal->id }}]" id="{{ $key }}_{{ $soal->id }}" value="{{ $key }}" required>
                            <label class="form-check-label" for="{{ $key }}_{{ $soal->id }}">
                                <span class="badge bg-light text-dark me-2">{{ $label }}</span> {{ $soal->$key }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button class="btn btn-success btn-lg rounded-pill shadow-sm mt-4 animate__animated animate__fadeInUp" style="animation-delay: {{ 0.1 * count($soals) + 0.5 }}s;">
                <i class="bi bi-check-all me-2"></i> Jawab Semua
            </button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
<style>
    .text-shadow {
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }
</style>
@endpush
