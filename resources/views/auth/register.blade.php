<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-r from-purple-400 via-pink-500 to-purple-600 flex items-center justify-center overflow-hidden">
        <div class="relative z-10 w-full sm:max-w-lg px-8 py-10 bg-white bg-opacity-80 shadow-xl rounded-lg border border-gray-300">
            <div class="text-center mb-10 animate-fade-down">
                <img src="{{ asset('images/LogoSiCerdas.png') }}" alt="Si Cerdas Logo" class="w-20 h-20 mx-auto animate-bounce">
                <h1 class="text-4xl font-semibold text-gray-800 mt-6 animate-slide-in-bottom">Bergabunglah!</h1>
                <p class="text-lg text-gray-600 mt-2 animate-fade-in" style="animation-delay: 0.3s;">Mulai petualangan belajarmu.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6 animate-slide-in-left">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="flex items-center text-lg" >
                        <i class="fas fa-user mr-3 text-gray-500 text-xl"></i>
                        <span>{{ __('Nama Lengkap') }}</span>
                    </x-input-label>
                    <x-text-input id="name" class="block mt-2 w-full rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-3 px-4 text-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama lengkapmu" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" class="flex items-center text-lg">
                        <i class="fas fa-envelope mr-3 text-gray-500 text-xl"></i>
                        <span>{{ __('Alamat Email') }}</span>
                    </x-input-label>
                    <x-text-input id="email" class="block mt-2 w-full rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-3 px-4 text-lg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="alamat@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="flex items-center text-lg">
                        <i class="fas fa-lock mr-3 text-gray-500 text-xl"></i>
                        <span>{{ __('Kata Sandi') }}</span>
                    </x-input-label>
                    <div class="relative">
                        <x-text-input id="password" class="block mt-2 w-full rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-12 py-3 px-4 text-lg" type="password" name="password" required autocomplete="new-password" placeholder="Kata sandi rahasiamu" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-lg leading-5 text-gray-500 cursor-pointer" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="flex items-center text-lg">
                        <i class="fas fa-check-double mr-3 text-gray-500 text-xl"></i>
                        <span>{{ __('Konfirmasi Kata Sandi') }}</span>
                    </x-input-label>
                    <div class="relative">
                        <x-text-input id="password_confirmation" class="block mt-2 w-full rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-12 py-3 px-4 text-lg" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandimu" />
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-lg leading-5 text-gray-500 cursor-pointer" onclick="togglePasswordVisibility('password_confirmation')">
                            <i class="fas fa-eye" id="password_confirmation-eye"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-between mt-6 animate-slide-in-right" style="animation-delay: 0.2s;">
                    <div class="text-lg">
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 transition duration-300 ease-in-out">
                            {{ __('Sudah punya akun? Masuk') }}
                        </a>
                    </div>
                    <x-primary-button class="w-auto py-3 px-8 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 focus:ring-indigo-300 transition duration-300 ease-in-out text-lg">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(inputId + '-eye');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

<style>
    /* Keyframes for fade in animation */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Keyframes for fade down animation */
    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Keyframes for slide in bottom animation */
    @keyframes slideInBottom {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Apply animations to elements */
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .animate-fade-down {
        animation: fadeDown 0.6s ease-out forwards;
    }

    .animate-slide-in-bottom {
        animation: slideInBottom 0.7s ease-out forwards;
    }
</style>