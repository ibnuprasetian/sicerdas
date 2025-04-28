@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg rounded-4 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white py-3 text-center">
                    <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i> Tambah User Baru</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('teacher.users.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person-circle me-2 text-info"></i> Nama
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="name" class="form-control form-control-lg rounded-end" value="{{ old('name') }}" required placeholder="Masukkan nama">
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" style="animation-delay: 0.1s;">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill me-2 text-secondary"></i> Email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control form-control-lg rounded-end" value="{{ old('email') }}" required placeholder="Masukkan email">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" style="animation-delay: 0.2s;">
                            <label for="role" class="form-label fw-semibold">
                                <i class="bi bi-tag-fill me-2 text-warning"></i> Role
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-person-badge-fill"></i>
                                </span>
                                <select name="role" class="form-select form-select-lg rounded-end" required>
                                    <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Guru</option>
                                    <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Siswa</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" style="animation-delay: 0.3s;">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-key-fill me-2 text-success"></i> Password Awal
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" name="password" class="form-control form-control-lg rounded-end" required placeholder="Masukkan password awal">
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4" style="animation-delay: 0.4s;">
                            <a href="{{ route('teacher.users.index') }}" class="btn btn-outline-secondary rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill">
                                <i class="bi bi-person-plus-fill me-1"></i> Simpan User
                            </button>
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
        .form-label i {
            vertical-align: middle;
        }
    </style>
@endpush
