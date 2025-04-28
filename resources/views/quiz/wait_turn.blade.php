@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>Battle #{{ $battle->id }}</h3>
    <p>Sedang menunggu giliran lawan...</p>
    <a href="{{ route('battle.play', $battle->id) }}" class="btn btn-primary mt-3">Refresh</a>
</div>
@endsection
