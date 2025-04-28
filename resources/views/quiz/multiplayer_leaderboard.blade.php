@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🏆 Leaderboard Kuis Multiplayer</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Skor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaderboard as $i => $player)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->total_score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
