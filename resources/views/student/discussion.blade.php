@extends('layouts.app')

@section('content')
<div class="px-6 py-4">
    <h1 class="text-2xl font-bold mb-4">Forum Diskusi: {{ $subMateri->judul }}</h1>

    <div class="mb-6">
        @foreach($discussions->where('parent_id', null) as $diskusi)
            <div class="bg-gray-100 p-4 rounded mb-3">
                <p class="font-semibold">{{ $diskusi->user->name }}:</p>
                <p>{{ $diskusi->message }}</p>

                @foreach($diskusi->replies as $reply)
                    <div class="ml-4 mt-2 p-3 bg-white border-l-4 border-blue-300 rounded">
                        <p class="font-semibold">{{ $reply->user->name }} (Guru):</p>
                        <p>{{ $reply->message }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Kirim Pertanyaan</h2>
        <form method="POST" action="{{ route('student.discussions.store') }}">
            @csrf
            <input type="hidden" name="sub_materi_id" value="{{ $subMateri->id }}">
            <textarea name="message" rows="3" class="w-full p-2 border rounded" required></textarea>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded">Kirim</button>
        </form>
    </div>
</div>
@endsection
