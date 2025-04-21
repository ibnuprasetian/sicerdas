<x-guest-layout>
    <!-- Seluruh background halaman -->
    <div class="min-h-screen bg-gradient-to-r from-purple-400 via-pink-500 to-purple-600 flex items-center justify-center">
        <!-- Container utama untuk login -->
        <div class="max-w-md mx-auto p-6 bg-white bg-opacity-70 shadow-lg rounded-lg">
            <!-- Logo di bagian atas -->
            <div class="text-center">
                <a href="/">
                    <img src="{{ asset('images/LogoSiCerdas.png') }}" alt="Logo" class="h-16 mx-auto mb-4">
                </a>
                <h2 class="text-2xl font-semibold text-gray-700">Welcome Back</h2>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Input untuk Email -->
                <div class="mt-6">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full border-2 border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        placeholder="Email Address"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Input untuk Password -->
                <div class="mt-6">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full border-2 border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Lupa Password & Login -->
                <div class="mt-4 flex items-center justify-between">
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-900">
                        {{ __('Forgot Your Password?') }}
                    </a>

                    <button type="submit" class="ml-4 bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-indigo-700 focus:outline-none">
                        {{ __('Login') }}
                    </button>
                </div>

            </form>

            <!-- Link untuk Sign Up -->
            <div class="mt-4 text-center">
                <span class="text-sm">Tidak Punya Akun? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900">SIGN UP</a></span>
            </div>
        </div>
    </div>
</x-guest-layout>
