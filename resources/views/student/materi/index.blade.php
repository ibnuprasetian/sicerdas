@extends('layouts.app')

@section('content')
<div class="container mx-auto py-5">
<h1 class="text-3xl font-extrabold text-indigo-700 mb-6 animate__animated animate__fadeInDown">
        <i class="fas fa-book text-indigo-600 text-4xl mb-4 group-hover:scale-110 transition-transform"></i> Materi yang Tersedia
    </h1>
    <div class="flex justify-between items-center mb-6">
        <form action="{{ route('student.materi.index') }}" method="GET" class="w-full md:w-1/2 lg:w-1/3">
            <div class="relative rounded-full shadow-md overflow-hidden focus-within:shadow-lg transition-shadow duration-300">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari Materi..."
                    class="w-full pl-5 pr-10 py-2 rounded-full border-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-auto">
                    <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($materis as $materi)
        <div
            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
            x-data="{ open: false }"
        >
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2 text-gray-700">{{ $materi->judul }}</h2>
                <p class="text-gray-500 text-sm mb-3 truncate">{{ $materi->deskripsi ?? 'Tidak ada deskripsi singkat.' }}</p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('student.materi.show', $materi->id) }}"
                       class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 transition-colors duration-200">
                        Lihat Materi
                    </a>
                    <button @click="open = ! open" class="text-gray-400 hover:text-gray-600 focus:outline-none transition-colors duration-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div x-show="open" class="border-t border-gray-200 bg-gray-50 p-4 text-sm text-gray-600">
                <p>Informasi lebih lanjut tentang materi ini bisa ditampilkan di sini.</p>
                {{-- Example: Display categories or tags --}}
                {{-- @if($materi->categories->isNotEmpty())
                    <div class="mt-2">
                        <span class="font-semibold">Kategori:</span>
                        @foreach($materi->categories as $category)
                            <span class="inline-block bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-xs mr-1">{{ $category->nama }}</span>
                        @endforeach
                    </div>
                @endif --}}
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Pemberitahuan!</strong>
                <span class="block sm:inline">Tidak ada materi yang tersedia saat ini.</span>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
