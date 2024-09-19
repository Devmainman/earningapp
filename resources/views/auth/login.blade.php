<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center bg-gray-100">
    <section class="flex flex-col md:flex-row w-full h-full items-center justify-center">

        <!-- Image Section for Large Screens -->
        <div class="hidden lg:flex lg:w-1/2 xl:w-2/3 h-full">
            <img src="https://source.unsplash.com/random" alt="Background Image" class="w-full h-full object-cover">
        </div>

        <!-- Form Section -->
        <div class="bg-white w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-6 lg:px-12 h-full flex items-center justify-center">
            <div class="w-full max-w-md">
                <h1 class="md:text-2xl font-bold leading-tight mt-4 mb-6 text-left text-[32px]">
                    Log in to your account
                </h1>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="block text-gray-700 text-[20px]" />
                        <x-text-input id="email" class="w-full px-4 py-3 rounded-lg h-[72px] mt-2 border focus:border-yellow-500 focus:bg-white focus:outline-none" 
                                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="text-red-600 mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="block text-gray-700 text-[20px]" />

                        <x-text-input id="password" class="w-full px-4 py-3 rounded-lg h-[72px] mt-2 border-2 focus:border-yellow-500 focus:bg-white focus:outline-none"
                                        type="password" name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="text-red-600 mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        </div>
                        <button class="bg-yellow-400 hover:bg-yellow-300 text-white font-semibold text-[24px] px-6 py-3 w-full sm:w-auto rounded-[30px]">
                            {{ __('Log in') }}
                        </button>
                    
                </form>
            </div>
        </div>
    </section>
</body>
</html>
