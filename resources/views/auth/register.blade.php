<x-guest-layout>
    <!-- Background Color -->
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-pink-500 to-purple-500">
        <div class="w-full sm:max-w-md px-8 py-6 bg-white shadow-lg rounded-xl">
            <!-- Logo -->
            <div class="text-center mb-6">
                <img src="{{ asset('images/LogoSiCerdas.png') }}" alt="Si Cerdas Logo" class="w-16 h-16 mx-auto">
                <h1 class="text-3xl font-semibold text-gray-800 mt-4">Sign Up</h1>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Re-enter Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Re-enter Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between mt-4">
                    <div class="text-sm">
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-900">
                            {{ __('Already have an account? Log In') }}
                        </a>
                    </div>

                    <!-- Shortened Sign Up Button -->
                    <x-primary-button class="w-auto py-2 px-6">
                        {{ __('Sign Up') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
