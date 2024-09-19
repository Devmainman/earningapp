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
                <h1 class=" md:text-2xl font-bold leading-tight mt-4 mb-6 text-left text-[32px]">
                    Create your account
                </h1>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 text-[20px]">Name</label>
                        <input id="name" placeholder="Enter your fullname" class="w-full px-4 py-3 rounded-lg h-[72px] mt-2 border focus:border-yellow-500 focus:bg-white focus:outline-none" 
                               type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        @error('name')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-gray-700 text-[20px]">Email Address</label>
                        <input id="email" placeholder="Enter your Email" class="w-full px-4 py-3 rounded-lg h-[72px] bg- mt-2 border focus:border-yellow-500 focus:bg-white focus:outline-none" 
                               type="email" name="email" :value="old('email')" required autocomplete="username" />
                        @error('email')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-700 text-[20px]">Password</label>
                        <input id="password" placeholder="Enter your Password" class="w-full px-4 py-3 rounded-lg h-[72px] bg- mt-2 border-2 focus:border-yellow-500 focus:bg-white focus:outline-none" 
                               type="password" name="password" required autocomplete="new-password" />
                        @error('password')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 text-[20px]">Confirm Password</label>
                        <input id="password_confirmation" placeholder="Conform your Password" class="w-full px-4 py-3 rounded-lg h-[72px] bg- mt-2 border focus:border-yellow-500 focus:bg-white focus:outline-none" 
                               type="password" name="password_confirmation" required autocomplete="new-password" />
                        @error('password_confirmation')
                            <p class="text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6 w-full flex justify-center">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-300 text-white font-semibold text-[24px] px-6 py-3 w-full sm:w-auto rounded-[30px]">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Already registered?') }} </div>
                         <!-- Register Button on Its Own -->
                         

                </form>
            </div>
        </div>
    </section>

    
</body>
</html>
