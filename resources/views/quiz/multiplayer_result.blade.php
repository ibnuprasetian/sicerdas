@extends('layouts.app')

@section('content')
<style>
    .result-box {
        animation: fadeIn 1s ease-in-out;
        padding: 2rem;
        text-align: center;
    }

    .winner {
        color: green;
        font-size: 24px;
        font-weight: bold;
        animation: bounce 1s infinite;
    }

    .loser {
        color: red;
        font-size: 24px;
        font-weight: bold;
    }

    .draw {
        color: orange;
        font-size: 24px;
        font-weight: bold;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .score-card {
        border: 2px solid #ccc;
        border-radius: 15px;
        padding: 20px;
        margin: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>

<div class="container result-box">
    <h2 class="{{ strtolower(str_replace(' ', '', $status)) }}">{{ $status }}</h2>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4 score-card bg-light">
            <h4>{{ $you->name }} (Kamu)</h4>
            <p class="display-6">Skor: {{ $you->total_score }}</p>
        </div>

        <div class="col-md-4 score-card bg-light">
            <h4>{{ $opponent->name }}</h4>
            <p class="display-6">Skor: {{ $opponent->total_score }}</p>
        </div>
    </div>

    <a href="{{ route('multiplayer.index') }}" class="btn btn-primary mt-4">Main Lagi 🔁</a>
</div>
@endsection
