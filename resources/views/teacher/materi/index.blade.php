@extends('layouts.app')

@section('content')
    <div class="container py-5">
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
        <i class="fas fa-book text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i> Daftar Materi
    </h1>

        <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeIn">
            <a href="{{ route('teacher.materi.create') }}"
                class="btn btn-success rounded-pill shadow-sm animate__animated animate__fadeInRight">
                <i class="bi bi-plus-circle-fill me-2"></i> Tambah Materi
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm animate__animated animate__slideInDown"
                role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($materis as $materi)
                <div class="col animate__animated animate__slideInUp" style="animation-delay: {{ 0.15 * $loop->index }}s;">
                    <div class="card h-100 shadow-lg rounded-4 border-0 hover-effect">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-info"><i class="bi bi-journal-bookmark-fill me-2"></i>
                                {{ $materi->judul }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($materi->deskripsi, 80) }}</p>
                            @if($materi->subMateris->isNotEmpty())
                                <ul class="list-unstyled mt-2 small">
                                    <li class="text-muted fw-semibold"><i class="bi bi-list-bulleted me-1"></i> Sub-materi:</li>
                                    @foreach($materi->subMateris->take(3) as $sub)
                                        <li><i class="bi bi-file-earmark-text-fill me-2 text-secondary"></i> {{ $sub->judul }}</li>
                                    @endforeach
                                    @if($materi->subMateris->count() > 3)
                                        <li class="text-muted fst-italic">+ {{ $materi->subMateris->count() - 3 }} lainnya</li>
                                    @endif
                                </ul>
                            @else
                                <p class="text-muted small fst-italic mt-2"><i
                                        class="bi bi-exclamation-circle-fill me-1 text-warning"></i> Tidak ada sub-materi</p>
                            @endif
                            <div class="mt-auto d-flex justify-content-end gap-2">
                                <a href="{{ route('teacher.materi.edit', $materi->id) }}"
                                    class="btn btn-sm btn-outline-warning rounded-pill shadow-sm" title="Edit">
                                    <i class="bi bi-pencil-square-fill"></i>
                                </a>
                                <form action="{{ route('teacher.materi.destroy', $materi->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill shadow-sm delete-button"
                                        onclick="return confirm('Hapus materi ini?')" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 animate__animated animate__fadeIn">
                    <div class="alert alert-info rounded-pill shadow-sm" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i> Tidak ada materi yang tersedia.
                        <a href="{{ route('teacher.materi.create') }}" class="alert-link ms-2">Tambahkan materi baru di
                            sini</a>.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .card-title i {
            vertical-align: middle;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: white;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .hover-effect {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .delete-button:hover {
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-3px);
            }

            50% {
                transform: translateX(3px);
            }

            75% {
                transform: translateX(-3px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
@endpush