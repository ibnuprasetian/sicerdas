@extends('layouts.app')

@section('content')
    <div class="container py-5">
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
        <i class="fas fa-question-circle text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i> Daftar Quiz
    </h1>
        <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeInDown">
            <a href="{{ route('teacher.quiz.create') }}"
                class="btn btn-success rounded-pill shadow animate__animated animate__fadeInRight"
                style="animation-delay: 0.2s;">
                <i class="bi bi-plus-circle me-1"></i> Tambah Soal
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-pill shadow animate__animated animate__slideInDown mb-3"
                role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg rounded-4 animate__animated animate__fadeIn">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col" class="border-0">Pertanyaan</th>
                                <th scope="col" class="border-0 text-center">Level</th>
                                <th scope="col" class="border-0 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($soals as $soal)
                                <tr class="animate__animated animate__fadeIn"
                                    style="animation-delay: {{ 0.05 * $loop->index + 0.3 }}s;">
                                    <td>
                                        <i class="bi bi-question-octagon-fill text-info me-2"></i>
                                        {{ Str::limit($soal->pertanyaan, 60) }}
                                        @if (strlen($soal->pertanyaan) > 60)
                                            <span class="text-muted fst-italic">(...)</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary rounded-pill"><i class="bi bi-tag me-1"></i> Level
                                            {{ $soal->level }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('teacher.quiz.edit', $soal->id) }}"
                                                class="btn btn-sm btn-outline-warning rounded-pill shadow"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Soal">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('teacher.quiz.destroy', $soal->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow"
                                                    onclick="return confirm('Yakin ingin menghapus soal ini?')"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Soal">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-3">
                                        <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i> Tidak ada soal yang
                                        tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <style>
        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: white;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
            /* Efek hover lembut */
        }
    </style>
@endpush

@push('scripts')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endpush