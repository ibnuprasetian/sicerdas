@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>⏳ Menunggu lawan untuk mulai battle...</h3>
    <p class="text-muted">Halaman akan otomatis berpindah ketika lawan ditemukan.</p>

    <div class="spinner-border text-primary mt-4" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<script>
    setInterval(function() {
        fetch("{{ route('multiplayer.checkMatch') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === 'ready') {
                    window.location.href = "{{ route('multiplayer.index') }}";
                }
            });
    }, 3000); // Cek tiap 3 detik
</script>
@endsection
