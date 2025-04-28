@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="card shadow-lg rounded-4 overflow-hidden animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white py-4">
                    <h4 class="mb-0 text-center"><i class="bi bi-plus-circle me-2"></i> Tambah Soal Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('teacher.quiz.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pertanyaan" class="form-label fw-semibold"><i class="bi bi-question-circle me-2"></i> Pertanyaan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start"><i class="bi bi-input-cursor"></i></span>
                                <input type="text" name="pertanyaan" class="form-control form-control-lg rounded-end" required placeholder="Ketik pertanyaan di sini...">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label fw-semibold"><i class="bi bi-bar-chart-line me-2"></i> Level</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start"><i class="bi bi-filter"></i></span>
                                <select name="level" class="form-select form-select-lg rounded-end" required>
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
                        </div>

                        <div class="mb-3">
                            <label for="opsi_a" class="form-label fw-semibold"><i class="bi bi-list-ul me-2"></i> Opsi A</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">A</span>
                                <input type="text" name="opsi_a" class="form-control form-control-lg rounded-end" required placeholder="Jawaban pilihan A">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="opsi_b" class="form-label fw-semibold"><i class="bi bi-list-ul me-2"></i> Opsi B</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">B</span>
                                <input type="text" name="opsi_b" class="form-control form-control-lg rounded-end" required placeholder="Jawaban pilihan B">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="opsi_c" class="form-label fw-semibold"><i class="bi bi-list-ul me-2"></i> Opsi C</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">C</span>
                                <input type="text" name="opsi_c" class="form-control form-control-lg rounded-end" required placeholder="Jawaban pilihan C">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="opsi_d" class="form-label fw-semibold"><i class="bi bi-list-ul me-2"></i> Opsi D</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">D</span>
                                <input type="text" name="opsi_d" class="form-control form-control-lg rounded-end" required placeholder="Jawaban pilihan D">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jawaban_benar" class="form-label fw-semibold"><i class="bi bi-check-circle-fill text-success me-2"></i> Jawaban Benar</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start"><i class="bi bi-patch-check-fill text-success"></i></span>
                                <select name="jawaban_benar" class="form-select form-select-lg rounded-end" required>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('teacher.quiz.index') }}" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-1"></i> Batal</a>
                            <button type="submit" class="btn btn-success rounded-pill"><i class="bi bi-save me-1"></i> Simpan Soal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <style>
        .bg-gradient-primary {
            background: linear-gradient(to right, #007bff, #6610f2);
        }
        .form-label .bi {
            vertical-align: middle;
        }
    </style>
@endpush