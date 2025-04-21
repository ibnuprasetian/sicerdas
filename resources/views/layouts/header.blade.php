<div class="bg-blue-600 p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="{{ asset('images/LogoSiCerdas.png') }}" alt="Si Cerdas Logo" class="w-11 h-11 mr-2">
        <img src="{{ asset('images/TextSiCerdas.png') }}" alt="Si Cerdas Logo" class="w-30 h-9 mr-2">
    </div>
    <div class="flex space-x-6 text-white items-center">
        <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
        <a href="{{ route('materi') }}" class="hover:underline">Materi</a>
        <a href="{{ route('profile') }}" class="hover:underline">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:underline bg-blue-500 px-4 py-2 rounded text-white">Log Out</button> <!-- Menambahkan kelas untuk Log Out -->
        </form>
    </div>
</div>
