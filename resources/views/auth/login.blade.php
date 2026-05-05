<x-guest-layout>

    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-[500] text-gray-900 mb-4">Log in to Exclusive</h1>
            <p class="text-gray-600">Enter your details below</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-10">
            @csrf

            <!-- Email or Phone Number -->
            <div>
                <input type="text" name="email" id="email" placeholder="Email or Phone Number"
                    value="{{ old('email') }}" @class([
                        'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                        'border-red-500' => $errors->has('email'),
                        'border-gray-300' => !$errors->has('email'),
                    ]) required autofocus>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <input type="password" name="password" id="password" placeholder="Password" @class([
                    'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                    'border-red-500' => $errors->has('password'),
                    'border-gray-300' => !$errors->has('password'),
                ]) required>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons and Links -->
            <div class="flex items-center justify-between pt-4">
                <button type="submit"
                    class="bg-[#DB4444] text-white px-12 h-14 rounded-[4px] hover:bg-red-600 transition duration-300 font-medium">
                    Log in
                </button>

                {{-- <a href=""
                    class="text-[#DB4444] hover:text-red-600 transition duration-300">
                    Forgot Password?
                </a> --}}
            </div>

            <!-- Sign Up Link -->
            <div class="text-center pt-6">
                <span class="text-black">Don't have an account? </span>
                <a href="{{ route('register') }}" class="text-black font-medium hover:underline">
                    Sign up
                </a>
            </div>
        </form>
    </div>

    @push('styles')
        <style>
            /* Remove default input styles */
            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus {
                -webkit-box-shadow: 0 0 0px 1000px white inset;
                transition: background-color 5000s ease-in-out 0s;
            }
        </style>
    @endpush
</x-guest-layout>
