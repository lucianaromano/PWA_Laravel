<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"  />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-[pink-900] border-gray-300 border-pink-700 text-pink-600 shadow-sm focus:ring-indigo-500 focus:ring-pink-600 focus:ring-offset-pink-800" name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 gap-2">
            @if (Route::has('password.request'))
                <a class="px-3 py-1 rounded rounded-full bg-pink-100 text-pink-900 border-transparent hover:bg-transparent border hover:border-pink-900 text-sm transition" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="px-3 py-1 rounded rounded-full bg-pink-200 text-pink-900 hover:bg-pink-900 hover:text-white text-sm transition">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
