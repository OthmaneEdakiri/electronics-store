<x-app-layout>
    <div class="container">
        <!-- Breadcrumb -->
        <div class="py-20">
            <nav class="text-sm text-gray-500">
                <a href="/" class="hover:text-black transition-colors capitalize">Account</a>
                <span class="mx-2">/</span>
                <span href="/"
                    class="hover:text-black transition-colors capitalize">{{ $product->category->name }}</span>
                <span class="mx-2">/</span>
                <span class="text-black capitalize">{{ $product->name }}</span>
            </nav>
        </div>

        @if(session('success'))
            <div class="mb-12 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @error('quantity')
            <div class="mb-12 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror

        <!-- Product Details Grid -->
        <div class="flex gap-[70px] mb-[140px]">
            <!-- Left Column - Product Images -->
            <div class="flex gap-4 w-2/3">

                <!-- Main Image -->
                <div
                    class="flex-1 max-w-[600px] h-[500px] relative bg-gray-100 rounded-lg p-8 flex items-center justify-center">
                    <img class="h-full w-full object-contain" src="{{ asset("storage/" . $product->image_url) }}"
                        alt="{{ $product->name }}" class="max-w-full h-auto">
                </div>
            </div>

            <!-- Right Column - Product Info -->
            <div class="w-1/3">
                <h1 class="text-[24px] font-semibold tracking-[3%] mb-4">{{ $product->name }}</h1>

                <!-- Rating & Stock -->
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center">
                        <div class="flex gap-1 text-yellow-400">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.9464 6.83186C15.0171 6.02197 14.4444 4.3153 13.1018 4.3153H10.6727C10.0587 4.3153 9.51645 3.91533 9.33512 3.32881L8.61098 0.9865C8.20433 -0.328818 6.34254 -0.328818 5.9359 0.986499L5.21175 3.32881C5.03042 3.91533 4.48813 4.3153 3.87421 4.3153H1.40305C0.0648563 4.3153 -0.510644 6.01286 0.551656 6.82666L2.66813 8.44805C3.13229 8.80362 3.32658 9.41021 3.1554 9.96929L2.3864 12.4809C1.9876 13.7833 3.49511 14.8305 4.57645 14.0021L6.42205 12.5882C6.92441 12.2034 7.62247 12.2034 8.12483 12.5882L9.95413 13.9896C11.037 14.8192 12.546 13.768 12.1431 12.4647L11.3634 9.94283C11.1894 9.37988 11.3864 8.76821 11.8564 8.41275L13.9464 6.83186Z"
                                    fill="#FFAD33" />
                            </svg>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.9464 6.83186C15.0171 6.02197 14.4444 4.3153 13.1018 4.3153H10.6727C10.0587 4.3153 9.51645 3.91533 9.33512 3.32881L8.61098 0.9865C8.20433 -0.328818 6.34254 -0.328818 5.9359 0.986499L5.21175 3.32881C5.03042 3.91533 4.48813 4.3153 3.87421 4.3153H1.40305C0.0648563 4.3153 -0.510644 6.01286 0.551656 6.82666L2.66813 8.44805C3.13229 8.80362 3.32658 9.41021 3.1554 9.96929L2.3864 12.4809C1.9876 13.7833 3.49511 14.8305 4.57645 14.0021L6.42205 12.5882C6.92441 12.2034 7.62247 12.2034 8.12483 12.5882L9.95413 13.9896C11.037 14.8192 12.546 13.768 12.1431 12.4647L11.3634 9.94283C11.1894 9.37988 11.3864 8.76821 11.8564 8.41275L13.9464 6.83186Z"
                                    fill="#FFAD33" />
                            </svg>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.9464 6.83186C15.0171 6.02197 14.4444 4.3153 13.1018 4.3153H10.6727C10.0587 4.3153 9.51645 3.91533 9.33512 3.32881L8.61098 0.9865C8.20433 -0.328818 6.34254 -0.328818 5.9359 0.986499L5.21175 3.32881C5.03042 3.91533 4.48813 4.3153 3.87421 4.3153H1.40305C0.0648563 4.3153 -0.510644 6.01286 0.551656 6.82666L2.66813 8.44805C3.13229 8.80362 3.32658 9.41021 3.1554 9.96929L2.3864 12.4809C1.9876 13.7833 3.49511 14.8305 4.57645 14.0021L6.42205 12.5882C6.92441 12.2034 7.62247 12.2034 8.12483 12.5882L9.95413 13.9896C11.037 14.8192 12.546 13.768 12.1431 12.4647L11.3634 9.94283C11.1894 9.37988 11.3864 8.76821 11.8564 8.41275L13.9464 6.83186Z"
                                    fill="#FFAD33" />
                            </svg>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.9464 6.83186C15.0171 6.02197 14.4444 4.3153 13.1018 4.3153H10.6727C10.0587 4.3153 9.51645 3.91533 9.33512 3.32881L8.61098 0.9865C8.20433 -0.328818 6.34254 -0.328818 5.9359 0.986499L5.21175 3.32881C5.03042 3.91533 4.48813 4.3153 3.87421 4.3153H1.40305C0.0648563 4.3153 -0.510644 6.01286 0.551656 6.82666L2.66813 8.44805C3.13229 8.80362 3.32658 9.41021 3.1554 9.96929L2.3864 12.4809C1.9876 13.7833 3.49511 14.8305 4.57645 14.0021L6.42205 12.5882C6.92441 12.2034 7.62247 12.2034 8.12483 12.5882L9.95413 13.9896C11.037 14.8192 12.546 13.768 12.1431 12.4647L11.3634 9.94283C11.1894 9.37988 11.3864 8.76821 11.8564 8.41275L13.9464 6.83186Z"
                                    fill="#FFAD33" />
                            </svg>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.9464 6.83186C15.0171 6.02197 14.4444 4.3153 13.1018 4.3153H10.6727C10.0587 4.3153 9.51645 3.91533 9.33512 3.32881L8.61098 0.9865C8.20433 -0.328818 6.34254 -0.328818 5.9359 0.986499L5.21175 3.32881C5.03042 3.91533 4.48813 4.3153 3.87421 4.3153H1.40305C0.0648563 4.3153 -0.510644 6.01286 0.551656 6.82666L2.66813 8.44805C3.13229 8.80362 3.32658 9.41021 3.1554 9.96929L2.3864 12.4809C1.9876 13.7833 3.49511 14.8305 4.57645 14.0021L6.42205 12.5882C6.92441 12.2034 7.62247 12.2034 8.12483 12.5882L9.95413 13.9896C11.037 14.8192 12.546 13.768 12.1431 12.4647L11.3634 9.94283C11.1894 9.37988 11.3864 8.76821 11.8564 8.41275L13.9464 6.83186Z"
                                    fill="#FFAD33" />
                            </svg>
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(150 Reviews)</span>
                    </div>
                    <span class="opacity-50">|</span>
                    <span class="text-[#00FF66] font-semibold">In Stock</span>
                </div>
                <!-- Price -->
                <div class="text-2xl tracking-[3%] mb-6">{{ $product->price }} dh</div>

                @if ($product->description)
                    <!-- Description -->
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {{$product->description}}
                    </p>
                @endif

                {{-- <div class="bg-black h-[1px] w-full mb-6"></div> --}}

                <!-- Quantity and Buy Now -->
                <div class="flex items-center gap-4 mb-8">
                    <form class="flex flex-1 items-center gap-4" action="{{ route("cart.add", $product->id) }}"
                        method="POST">
                        @csrf

                        <div class="flex border border-gray-300 rounded-md">
                            <button type="button" id="decrement-quantity"
                                class="group w-10 h-11 flex items-center justify-center hover:bg-[#DB4444] transition-colors">
                                <svg class="stroke-black group-hover:stroke-white transition-colors" width="18"
                                    height="2" viewBox="0 0 18 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.75 0.75H0.75" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                            <input min="1" max="1000" name="quantity" id="quantity-input" type="number" value="1"
                                class="text-[20px] font-medium leading-7 no-spinner w-20 h-11 text-center border-x border-gray-300 " />
                            <button type="button" id="increment-quantity"
                                class="group w-10 h-11 flex justify-center items-center hover:bg-[#DB4444] transition-colors">
                                <svg class="stroke-black group-hover:stroke-white transition-colors" width="18"
                                    height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 16.75V8.75M8.75 8.75V0.75M8.75 8.75H16.75M8.75 8.75H0.75"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <button type="submit"
                            class="flex-1 bg-[#DB4444] text-white h-11 px-2 flex items-center justify-center rounded-md hover:bg-red-600 transition duration-300 font-medium">
                            Add To Cart
                        </button>
                    </form>
                    <form method="POST"
                        action="{{ route($product->isInWishlist() ? "wishlist.remove" : "wishlist.add", $product->id) }}">
                        @csrf
                        <button type="submit" @class(['h-10 w-10 border rounded-[4px] flex justify-center items-center transition-colors', 'border-[#DB4444]' => $product->isInWishlist(), 'border-[black]' => !$product->isInWishlist()])>
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.75 0.75C2.989 0.75 0.75 2.966 0.75 5.7C0.75 7.907 1.625 13.145 10.238 18.44C10.3923 18.5339 10.5694 18.5835 10.75 18.5835C10.9306 18.5835 11.1077 18.5339 11.262 18.44C19.875 13.145 20.75 7.907 20.75 5.7C20.75 2.966 18.511 0.75 15.75 0.75C12.989 0.75 10.75 3.75 10.75 3.75C10.75 3.75 8.511 0.75 5.75 0.75Z"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    stroke="{{ $product->isInWishlist() ? "#DB4444" : "black" }}"
                                    fill="{{ $product->isInWishlist() ? "#DB4444" : "" }}" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Delivery Info -->
                <div class="border border-gray-200">
                    <!-- Free Delivery -->
                    <div class="px-4 pb-4 pt-6 border-b border-gray-200">
                        <div class="flex items-start gap-3">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_261_4843)">
                                    <path
                                        d="M11.6673 31.6667C13.5083 31.6667 15.0007 30.1743 15.0007 28.3333C15.0007 26.4924 13.5083 25 11.6673 25C9.82637 25 8.33398 26.4924 8.33398 28.3333C8.33398 30.1743 9.82637 31.6667 11.6673 31.6667Z"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8.33398 28.3335H7.00065C5.89608 28.3335 5.00065 27.4381 5.00065 26.3335V21.6668M3.33398 8.3335H19.6673C20.7719 8.3335 21.6673 9.22893 21.6673 10.3335V28.3335M15.0007 28.3335H25.0007M31.6673 28.3335H33.0007C34.1052 28.3335 35.0007 27.4381 35.0007 26.3335V18.3335M35.0007 18.3335H21.6673M35.0007 18.3335L30.5833 10.9712C30.2218 10.3688 29.5708 10.0002 28.8683 10.0002H21.6673"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M5 11.8182H11.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M1.81836 15.4545H8.48503" stroke="black" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5 19.0909H11.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_261_4843">
                                        <rect width="40" height="40" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <div>
                                <h4 class="font-medium">Free Delivery</h4>
                                <p class="text-[12px] leading-[18px] underline">Enter your postal code for Delivery
                                    Availability</p>
                            </div>
                        </div>
                    </div>

                    <!-- Return Delivery -->
                    <div class="px-4 pb-6 pt-4">
                        <div class="flex items-start gap-3">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_261_4865)">
                                    <path
                                        d="M33.3327 18.3334C32.9251 15.4004 31.5645 12.6828 29.4604 10.5992C27.3564 8.51557 24.6256 7.18155 21.6888 6.80261C18.752 6.42366 15.7721 7.02082 13.208 8.5021C10.644 9.98337 8.6381 12.2666 7.49935 15M6.66602 8.33335V15H13.3327"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M6.66602 21.6667C7.07361 24.5997 8.43423 27.3173 10.5383 29.4009C12.6423 31.4845 15.3731 32.8185 18.3099 33.1974C21.2467 33.5764 24.2266 32.9792 26.7907 31.4979C29.3547 30.0167 31.3606 27.7335 32.4994 25M33.3327 31.6667V25H26.666"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_261_4865">
                                        <rect width="40" height="40" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <div>
                                <h4 class="font-medium">Return Delivery</h4>
                                <p class="text-[12px] leading-[18px] underline">Free 30 Days Delivery Returns. Details
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($relatedItems) > 0)
        <!-- Related Item -->
        <div class="container mb-[140px]">
            <!-- Header -->
            <div class="mb-[60px]">
                <h2 class="text-sm flex items-center gap-[10px] font-semibold text-[#DB4444] mb-5"><span
                        class="w-5 h-10 bg-[#DB4444]"></span> Related Item</h2>
            </div>
            <div class="grid grid-cols-4 gap-[30px]">
                @foreach ($relatedItems as $item)
                    <x-product-card :product="$item" />
                @endforeach
            </div>
    </div> @endif @push('scripts')
        <script>
            const quantityInput = document.getElementById("quantity-input");
            const decrementBtn = document.getElementById("decrement-quantity");
            const incrementBtn = document.getElementById("increment-quantity");

            const min = parseInt(quantityInput.min) || 0;
            const max = parseInt(quantityInput.max) || Infinity;

            incrementBtn.addEventListener("click", () => {
                let value = parseInt(quantityInput.value) || 0;

                if (value < max) { quantityInput.value = value + 1; }
            }); decrementBtn.addEventListener("click", () => {
                let value = parseInt(quantityInput.value) || 0;

                if (value > min) {
                    quantityInput.value = value - 1;
                }
            });
        </script>
    @endpush
</x-app-layout>
