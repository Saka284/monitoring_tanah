<x-guest-layout>
    <!-- Session Status -->
    <div class="absolute top-0 left-0 p-4">
        <img src="{{ asset('assets/img/logo omahiot.svg') }}" alt="Logo" class="h-8">
    </div>
    <x-auth-session-status class="mb-6" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}" class="">
        @csrf
        <div class="flex flex-col items-center text-center">
            <h1 class="text-5xl font-semibold text-[#117554]">Welcome</h1>
            <p class="text-gray-400">Login to your account</p>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-xs sm:text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>
        <div class="block mt-4">
            <x-primary-button class="py-3 w-full flex justify-center">
                {{ __('Login') }}
            </x-primary-button>
            <span class="text-gray-600 text-sm mt-4 flex justify-center">Don't have an account?&nbsp;
                <a href="{{ route('register') }}" class="text-[#117554]">Register</a></span>
        </div>
    </form>
</x-guest-layout>
