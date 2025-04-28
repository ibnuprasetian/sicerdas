@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-indigo-700 animate-pulse"><i class="fas fa-user-cog mr-2"></i> Profil Pengguna</h2>
        <p class="mt-2 text-gray-600">Kelola informasi pribadi dan keamanan akunmu.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md shadow-sm border border-green-200 animate-fade-in">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-xl shadow-md overflow-hidden animate-slide-in-left">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-indigo-700 mb-4"><i class="fas fa-info-circle mr-2"></i> Info Akun</h3>

                @php
                    $icon = Auth::user()->photo;
                    $colorMap = [
                        'user' => 'bg-blue-500',
                        'user-graduate' => 'bg-indigo-500',
                        'user-astronaut' => 'bg-purple-500',
                        'user-ninja' => 'bg-gray-700',
                        'user-secret' => 'bg-red-500',
                        'cat' => 'bg-yellow-400',
                        'dog' => 'bg-amber-500',
                        'frog' => 'bg-green-500',
                        'dove' => 'bg-sky-400',
                        'hippo' => 'bg-gray-300',
                        'horse' => 'bg-orange-600',
                        'fish' => 'bg-teal-400',
                        'dragon' => 'bg-rose-500',
                    ];
                    $bgColor = $colorMap[$icon] ?? 'bg-indigo-400';
                @endphp

                <div id="avatar-preview" class="relative w-24 h-24 mx-auto rounded-full {{ $bgColor }} flex items-center justify-center text-white text-4xl shadow-lg transition-transform duration-300 hover:scale-105">
                    <i class="fas fa-{{ $icon }} animate-pulse"></i>
                    <button type="button" id="toggle-avatar" class="absolute bottom-0 right-0 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>

                <div id="avatar-options" class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mt-4 w-4/5 md:w-1/2 bg-white p-6 rounded-xl shadow-lg border border-gray-200 z-20 animate-fade-in">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Pilih Avatar</h4>
                    <div class="grid grid-cols-4 gap-4 justify-center">
                        @foreach($colorMap as $val => $color)
                            <label class="cursor-pointer transition-transform duration-200 hover:scale-110">
                                <input type="radio" name="photo" value="{{ $val }}" class="hidden" form="profile-form" {{ $icon == $val ? 'checked' : '' }}>
                                <span class="w-12 h-12 rounded-full {{ $color }} flex items-center justify-center text-white text-2xl shadow-md icon-option" data-icon="{{ $val }}" data-color="{{ $color }}">
                                    <i class="fas fa-{{ $val }}"></i>
                                </span>
                            </label>
                        @endforeach
                    </div>
                    <div class="mt-4 text-right">
                        <button type="button" id="close-avatar-options" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-3 py-1 rounded-md text-sm focus:outline-none">Tutup</button>
                    </div>
                </div>
                <div id="avatar-backdrop" class="hidden fixed top-0 left-0 w-full h-full bg-black opacity-50 z-10"></div>

                <div class="text-center mt-6 space-y-2">
                    <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    <p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ Auth::user()->role == 1 ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                            <i class="fas fa-{{ Auth::user()->role == 1 ? 'user-tie' : 'user-graduate' }} mr-1"></i>
                            {{ Auth::user()->role == 1 ? 'Guru' : 'Siswa' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="md:col-span-2 bg-white rounded-xl shadow-md overflow-hidden animate-slide-in-right">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-indigo-700 mb-4"><i class="fas fa-edit mr-2"></i> Ubah Informasi Profil</h3>
                <form id="profile-form" method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-300">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        <div class="md:col-span-2 bg-white rounded-xl shadow-md overflow-hidden animate-slide-in-bottom">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-indigo-700 mb-4"><i class="fas fa-key mr-2"></i> Ubah Password</h3>
                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <input type="password" name="current_password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('current_password', 'updatePassword') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('password', 'updatePassword') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('password_confirmation', 'updatePassword') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-300">
                        <i class="fas fa-sync-alt mr-2"></i> Update Password
                    </button>
                </form>
            </div>
        </div>

        <div class="md:col-span-3 bg-red-50 border border-red-200 rounded-xl shadow-sm overflow-hidden animate-fade-in">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-red-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-exclamation-triangle"></i> Hapus Akun
                </h3>
                <p class="text-sm text-red-600 mb-4">
                    Menghapus akun akan menghapus seluruh data secara permanen. Tindakan ini <strong>tidak bisa dibatalkan</strong>. Mohon pertimbangkan dengan matang sebelum melanjutkan.
                </p>
                <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Yakin ingin menghapus akun?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-red-500 rounded-md shadow-sm text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-300">
                        <i class="fas fa-trash-alt mr-2"></i> Hapus Akun Saya
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleAvatarButton = document.getElementById('toggle-avatar');
        const avatarOptionsBox = document.getElementById('avatar-options');
        const avatarBackdrop = document.getElementById('avatar-backdrop');
        const closeAvatarOptionsButton = document.getElementById('close-avatar-options');
        const avatarPreview = document.getElementById('avatar-preview');
        const iconOptions = document.querySelectorAll('.icon-option');

        // Toggle visibility of avatar options box
        toggleAvatarButton.addEventListener('click', function () {
            avatarOptionsBox.classList.remove('hidden');
            avatarBackdrop.classList.remove('hidden');
        });

        // Close avatar options box
        closeAvatarOptionsButton.addEventListener('click', function () {
            avatarOptionsBox.classList.add('hidden');
            avatarBackdrop.classList.add('hidden');
        });

        avatarBackdrop.addEventListener('click', function () {
            avatarOptionsBox.classList.add('hidden');
            avatarBackdrop.classList.add('hidden');
        });

        // Update avatar preview and the form input
        iconOptions.forEach(el => {
            el.addEventListener('click', function () {
                const icon = this.dataset.icon;
                const color = this.dataset.color;

                // Update preview
                avatarPreview.className = `relative w-24 h-24 mx-auto rounded-full ${color} flex items-center justify-center text-white text-4xl shadow-lg transition-transform duration-300 hover:scale-105`;
                avatarPreview.innerHTML = `<i class="fas fa-${icon} animate-pulse"></i><button type="button" id="toggle-avatar" class="absolute bottom-0 right-0 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"><i class="fas fa-camera"></i></button>`;

                // Update the hidden radio input
                document.querySelector('input[name="photo"]').value = icon;

                // Close the options box
                avatarOptionsBox.classList.add('hidden');
                avatarBackdrop.classList.add('hidden');

                // Re-attach the event listener to the new toggle button
                const newToggleButton = avatarPreview.querySelector('#toggle-avatar');
                newToggleButton.addEventListener('click', function () {
                    avatarOptionsBox.classList.remove('hidden');
                    avatarBackdrop.classList.remove('hidden');
                });
            });
        });

        // Prevent clicks inside the options box from closing it immediately
        avatarOptionsBox.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });
</script>
@endsection