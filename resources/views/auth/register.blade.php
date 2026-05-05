<x-guest-layout>

    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-[500] text-gray-900 mb-4">Create an account</h1>
            <p class="text-gray-600">Enter your details below</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-10">
            @csrf


            <!-- Name -->
            <div>
                <input type="text" name="name" id="name" placeholder="Name"
                    value="{{ old('name') }}" @class([
                        'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                        'border-red-500' => $errors->has('name'),
                        'border-gray-300' => !$errors->has('name'),
                    ]) required autofocus>
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <input type="text" name="email" id="email" placeholder="Email"
                    value="{{ old('email') }}" @class([
                        'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                        'border-red-500' => $errors->has('email'),
                        'border-gray-300' => !$errors->has('email'),
                    ]) required autofocus>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <input type="text" name="address" id="address" placeholder="Address"
                    value="{{ old('address') }}" @class([
                        'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                        'border-red-500' => $errors->has('address'),
                        'border-gray-300' => !$errors->has('address'),
                    ]) required>
                @error('address')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div>
                <input type="text" name="phone" id="phone" placeholder="Phone Number"
                    value="{{ old('phone') }}" @class([
                        'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                        'border-red-500' => $errors->has('phone'),
                        'border-gray-300' => !$errors->has('phone'),
                    ]) required>
                @error('phone')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <input type="password" name="password" id="password" placeholder="Password" @class([
                    'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                    'border-red-500' => $errors->has('password'),
                    'border-gray-300' => !$errors->has('password'),
                ])    required>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <input type="password" name="password_confirmation" id="password" placeholder="Confirm Your Password"
                    @class([
                        'w-full px-0 py-3 border-0 border-b-2 focus:border-black focus:ring-0 outline-none transition-colors',
                        'border-red-500' => $errors->has('password'),
                        'border-gray-300' => !$errors->has('password'),
                    ]) required>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <!-- Button Submit -->
            <button type="submit"
                class="bg-[#DB4444] text-white w-full px-12 h-14 rounded-[4px] hover:bg-red-600 transition duration-300 font-medium">
                Create Account
            </button>

            <!-- Login Link -->
            <div class="text-center pt-6">
                <span class="text-black">You already have an account? </span>
                <a href="{{ route('login') }}" class="text-black font-medium hover:underline">
                    Login
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
