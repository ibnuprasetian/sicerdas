@extends('layouts.app')

@section('content')
<div class="px-8 py-6">
    <a href="{{ route('teacher.diskusi.index') }}" class="text-sm text-blue-500 hover:underline mb-4 inline-block">
        ← Kembali ke Daftar Materi
    </a>

    <h1 class="text-2xl font-bold mb-6">Diskusi: {{ $materi->judul }}</h1>

    @foreach($materi->subMateris as $sub)
        <div class="mb-8 border-b pb-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $sub->judul }}</h2>

            @forelse($sub->discussions->where('parent_id', null) as $diskusi)
                <div class="bg-white p-4 rounded shadow mt-4">
                    <p class="text-blue-700 font-semibold">{{ $diskusi->user->name }}:</p>
                    <p class="mb-2">{{ $diskusi->message }}</p>

                    @foreach($diskusi->replies as $reply)
                        <div class="ml-4 mt-2 p-2 bg-gray-100 rounded">
                            <p class="text-green-700 font-semibold">{{ $reply->user->name }} (Guru):</p>
                            <p>{{ $reply->message }}</p>
                        </div>
                    @endforeach

                    <form action="{{ route('teacher.discussions.reply') }}" method="POST" class="mt-3 ml-4">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $diskusi->id }}">
                        <textarea name="message" rows="2" class="w-full border p-2 rounded" placeholder="Balas diskusi siswa..." required></textarea>
                        <button type="submit" class="mt-2 px-4 py-2 bg-green-600 text-white rounded">Balas</button>
                    </form>
                </div>
            @empty
                <p class="text-gray-500 mt-2">Belum ada diskusi untuk sub materi ini.</p>
            @endforelse
        </div>
    @endforeach
</div>
@endsection
