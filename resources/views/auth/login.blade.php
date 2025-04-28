<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-r from-purple-400 via-pink-500 to-purple-600 flex items-center justify-center">
        <div class="max-w-lg mx-auto p-8 bg-white bg-opacity-80 shadow-xl rounded-lg border border-gray-300">
            <div class="text-center mb-8">
                <a href="/">
                    <img src="{{ asset('images/LogoSiCerdas.png') }}" alt="Logo" class="h-20 mx-auto mb-6 animate-bounce">
                </a>
                <h2 class="text-3xl font-semibold text-gray-700 animate-fade-down">Selamat Datang Kembali</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6 animate-slide-in-bottom">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" class="text-lg" />
                    <x-text-input
                        id="email"
                        class="block mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Alamat Email Anda"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-lg" />
                    <div class="relative">
                        <x-text-input
                            id="password"
                            class="block mt-2 w-full border-2 border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg pr-10"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Kata Sandi Anda"
                        />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 text-gray-500 cursor-pointer" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <div class="text-lg">
                        <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-900 transition duration-300 ease-in-out">
                            {{ __('Lupa Kata Sandi?') }}
                        </a>
                    </div>

                    <button type="submit" class="ml-4 bg-indigo-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out text-lg">
                        {{ __('Masuk') }}
                    </button>
                </div>

            </form>

            <div class="mt-6 text-center animate-fade-in" style="animation-delay: 0.3s;">
                <span class="text-lg text-gray-600">Tidak Punya Akun?</span>
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900 transition duration-300 ease-in-out font-semibold">Daftar Sekarang</a>
            </div>
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