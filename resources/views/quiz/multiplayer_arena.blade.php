@extends('layouts.app')

@section('content')
<style>
    .arena-box {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    .attack-effect {
        animation: attack 0.4s ease-in-out;
    }

    @keyframes attack {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(1deg) scale(1.05); background-color: #ffecec; }
        100% { transform: rotate(0deg) scale(1); }
    }

    .timer-circle {
        width: 100px;
        height: 100px;
        border: 6px solid #198754;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #198754;
        font-size: 20px;
        margin: auto;
        animation: countdown linear forwards;
    }

    @keyframes countdown {
        from { border-color: #198754; }
        to { border-color: #dc3545; }
    }
</style>

<div class="container text-center arena-box">
    <h2>⚔️ Arena Battle</h2>

    @if (session('status'))
        <div class="alert alert-info attack-effect">{{ session('status') }}</div>
    @endif

    <div id="timer" class="timer-circle mb-4">{{ $timer_duration }}</div>

    <form method="POST" action="{{ route('multiplayer.submit') }}" id="quiz-form">
        @csrf
        <input type="hidden" name="soal_id" value="{{ $soal->id }}">
        <div class="mb-3">
            <label class="fw-bold">{{ $soal->pertanyaan }}</label>
            <input type="text" name="jawaban" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">🔥 Kirim Jawaban</button>
    </form>
</div>

<script>
    let timeLeft = {{ $timer_duration }};
    const timerDisplay = document.getElementById('timer');
    const form = document.getElementById('quiz-form');

    const countdown = setInterval(() => {
        timeLeft--;
        timerDisplay.textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(countdown);
            form.submit(); // auto submit ketika waktu habis
        }
    }, 1000);
</script>
@endsection
