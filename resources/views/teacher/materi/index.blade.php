@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 display-4 fw-semibold">Kelola Materi</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('teacher.materi.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> Tambah Materi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="list-group">
        @forelse($materis as $materi)
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center shadow-sm mb-2 rounded">
                <div>
                    <h5 class="mb-1 fw-bold">{{ $materi->judul }}</h5>
                    <p class="text-muted mb-1 small">{{ Str::limit($materi->deskripsi, 100) }}</p>
                    @if($materi->subMateris->isNotEmpty())
                        <ul class="list-unstyled small">
                            @foreach($materi->subMateris->take(3) as $sub)
                                <li><i class="bi bi-file-earmark-text me-1"></i> {{ $sub->judul }}</li>
                            @endforeach
                            @if($materi->subMateris->count() > 3)
                                <li class="text-muted fst-italic small">+{!! $materi->subMateris->count() - 3 !!} lainnya</li>
                            @endif
                        </ul>
                    @else
                        <p class="text-muted small fst-italic">Tidak ada sub-materi</p>
                    @endif
                </div>
                <div>
                    <a href="{{ route('teacher.materi.edit', $materi->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{ route('teacher.materi.destroy', $materi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus materi ini?')" title="Hapus">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                Tidak ada materi yang tersedia. Silakan tambahkan materi baru.
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* A very common and clear sans-serif font */
            -webkit-font-smoothing: antialiased; /* Improve font rendering for smoother appearance */
        }

        h1, h2, h3, h4, h5, h6, .btn {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600; /* Slightly bolder for headings and buttons */
        }

        .list-group-item h5 {
            font-weight: 700; /* Make the material title stand out more */
        }
    </style>
@endpush
