@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b">
                <h1 class="text-3xl font-semibold text-gray-800">{{ $materi->judul }}</h1>
            </div>

            <div class="p-6">
                @foreach ($materi->subMateris as $sub)
                    <div class="mb-8 border-b pb-6 last:border-b-0">
                        <h2 class="text-xl font-semibold text-gray-700 mb-3 flex items-center">
                            <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            {{ $sub->judul }}
                        </h2>

                        @php
                            // Ambil ID video dari berbagai format URL
                            $videoId = null;

                            if (Str::contains($sub->youtube_link, 'v=')) {
                                $videoId = Str::after($sub->youtube_link, 'v=');
                                $videoId = Str::before($videoId, '&');
                            } elseif (Str::contains($sub->youtube_link, 'youtu.be/')) {
                                $videoId = Str::after($sub->youtube_link, 'youtu.be/');
                            } elseif (Str::contains($sub->youtube_link, 'embed/')) {
                                $videoId = Str::after($sub->youtube_link, 'embed/');
                            }
                        @endphp

                        @if ($videoId)
                            <div class="mb-4 rounded-md shadow-md overflow-hidden">
                                <div class="relative" style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        @else
                            <p class="text-red-500 italic mb-4">Link video tidak valid.</p>
                        @endif

                        @if ($sub->deskripsi)
                            <div class="bg-gray-100 p-4 rounded-md shadow-sm mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 mb-2">Deskripsi</h4>
                                <p class="text-gray-600 leading-relaxed">{!! nl2br(e($sub->deskripsi)) !!}</p>
                            </div>
                        @endif

                        <div class="bg-gray-50 p-6 rounded-md shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                Forum Diskusi
                            </h3>

                            <div class="space-y-4">
                                @forelse ($sub->discussions->where('parent_id', null)->sortByDesc('created_at') as $diskusi)
                                    <div class="bg-white p-4 rounded-md shadow-sm border">
                                        <div class="flex items-start mb-2">
                                            <div class="font-semibold text-blue-700 mr-2">{{ $diskusi->user->name }}:</div>
                                            <p class="text-gray-700">{{ $diskusi->message }}</p>
                                        </div>

                                        <div class="ml-6 space-y-2">
                                            @foreach ($diskusi->replies->sortByDesc('created_at') as $reply)
                                                <div class="bg-gray-100 p-3 rounded-md border border-gray-200">
                                                    <div class="flex items-start">
                                                        <div class="font-semibold text-green-700 mr-2">
                                                            {{ $reply->user->name }}:</div>
                                                        <p class="text-gray-700">{{ $reply->message }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <form action="{{ route('student.discussions.reply') }}" method="POST"
                                            class="mt-3 ml-6">
                                            @csrf
                                            <input type="hidden" name="parent_id" value="{{ $diskusi->id }}">
                                            <textarea name="message" rows="1"
                                                class="w-full border p-2 rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                                                placeholder="Balas diskusi..." required></textarea>
                                            <button type="submit"
                                                class="mt-1 px-3 py-1 bg-green-600 text-white rounded-md text-sm hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">Balas</button>
                                        </form>
                                    </div>
                                @empty
                                    <p class="text-gray-500 italic">Belum ada diskusi untuk materi ini.</p>
                                @endforelse
                            </div>

                            <div class="mt-6">
                                <h4 class="text-lg font-semibold text-gray-700 mb-2 flex items-center">
                                    <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2V8a2 2 0 012-2h2v4l4 4V8z" />
                                    </svg>
                                    Ajukan Pertanyaan
                                </h4>
                                <form action="{{ route('student.discussions.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="sub_materi_id" value="{{ $sub->id }}">
                                    <textarea name="message" rows="3"
                                        class="w-full border p-2 rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                                        placeholder="Tulis pertanyaan Anda..." required></textarea>
                                    <button type="submit"
                                        class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Kirim
                                        Pertanyaan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
