<x-app-layout>
    <div class="py-16 min-h-screen">
        <div class="container">
            <h2 class="text-xl mb-[60px]">Wishlist ({{ count($wishlistItems) }})</h2>

            <div class="grid grid-cols-4">
                @forelse($wishlistItems as $wishlistItem)
                    <x-product-card :product="$wishlistItem->product" />
                @empty
                    <p class="text-gray-600 text-center col-span-4">There is no product to display</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
