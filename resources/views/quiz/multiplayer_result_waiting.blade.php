@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>⏳ Menunggu lawan menyelesaikan battle...</h3>
    <div class="spinner-border text-warning mt-3" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <script>
        setTimeout(() => {
            location.reload(); // Reload tiap 5 detik
        }, 5000);
    </script>
</div>
@endsection
