@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">🎮 Dashboard Game Interaktif</h2>

    <div class="row justify-content-center g-4">
        <!-- Mode Petualangan -->
        <div class="col-md-5">
            <div class="card shadow-lg border-success">
                <div class="card-body text-center">
                    <h4 class="card-title">🗺️ Petualangan Edukasi</h4>
                    <p class="card-text">Jelajahi level demi level dan kumpulkan XP untuk naik level!</p>
                    <a href="{{ route('quiz.petualangan.map') }}" class="btn btn-success mt-2">Mulai Petualangan</a>
                </div>
            </div>
        </div>

        <!-- Mode Multiplayer -->
        <div class="col-md-5">
            <div class="card shadow-lg border-primary">
                <div class="card-body text-center">
                    <h4 class="card-title">⚔️ Kuis Multiplayer</h4>
                    <p class="card-text">Tantang temanmu dalam kuis real-time seru dan penuh strategi!</p>
                    <a href="{{ route('multiplayer.index') }}" class="btn btn-primary mt-2">Masuk Arena</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
