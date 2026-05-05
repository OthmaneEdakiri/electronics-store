@props(['product'])
<a href="{{ route('product.details', $product->id) }}" class="group relative">
    <div class="bg-gray-100 rounded-lg p-6 mb-4 relative overflow-hidden">
        <!-- Wishlist & Quick View -->
        <div class="absolute top-4 right-4 flex flex-col gap-2 transition-opacity duration-300">
            <form method="POST"
                action="{{ route($product->isInWishlist() ? "wishlist.remove" : "wishlist.add", $product->id) }}">
                @csrf
                <button type="submit"
                    class="w-[34px] h-[34px] bg-white rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5" stroke="{{ $product->isInWishlist() ? "#DB4444" : "currentColor" }}"
                        fill="{{ $product->isInWishlist() ? "#DB4444" : "none" }}" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </button>
            </form>
            <button
                class="w-[34px] h-[34px] bg-white rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
            </button>
        </div>
        <!-- Product Image -->
        <div class="h-48 flex items-center justify-center">
            <img src="{{ asset("storage/" . $product->image_url) }}" alt="{{ $product->name }}"
                class="max-h-full object-contain">
        </div>
    </div>
    <!-- Product Info -->
    <div>
        <h4 class="font-semibold text-gray-800 mb-2">{{ $product->name }}</h4>
        <div class="flex items-center gap-3 mb-2">
            <span class="text-[#DB4444] font-semibold">{{ $product->price }} dh</span>
            {{-- <span class="text-gray-400 line-through">$360</span> --}}
        </div>
        <div class="flex items-center gap-2">
            <div class="flex text-[#FFAD33]">
                ★★★★★
            </div>
            <span class="text-gray-500 text-sm">(65)</span>
        </div>
    </div>
</a>
