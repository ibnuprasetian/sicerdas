@extends('layouts.app')

@section('content')
<div class="px-8 py-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Materi - Forum Diskusi</h1>

    <ul class="space-y-3">
        @foreach($materis as $materi)
            <li class="bg-white p-4 rounded shadow hover:bg-gray-100">
                <a href="{{ route('teacher.diskusi.show', $materi->id) }}" class="text-blue-600 font-semibold text-lg">
                    {{ $materi->judul }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
