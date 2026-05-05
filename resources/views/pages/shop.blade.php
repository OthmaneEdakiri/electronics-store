<x-app-layout>
    <div class="py-16">
        <!-- Breadcrumb -->
        <div class="container mb-12">
            <x-breadcrumb label="Shop" />
        </div>

        <div class="container">
            <div class="flex gap-12 mb-12">
                <!-- Page Header -->
                <div class="flex-1">
                    <h1 class="text-4xl font-semibold text-gray-900 mb-2">Shop</h1>
                    <div class="text-sm text-gray-500">Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} results</div>
                </div>

                <!-- Results Info -->
                <div class="flex items-center gap-4 text-sm">
                    <span>Sort by:</span>
                    <form method="GET" class="flex items-center gap-2">

                        <input type="hidden" name="search" value="{{ $search ?? '' }}">
                        <input type="hidden" name="category_id" value="{{ $categoryId ?? '' }}">
                        <input type="hidden" name="min_price" value="{{ $minPrice ?? 0 }}">
                        <input type="hidden" name="max_price" value="{{ $maxPrice ?? 10000 }}">
                        <select name="sort" onchange="this.form.submit()" class="border border-gray-300 rounded px-2 py-1">
                            <option value="newest" {{ ($sort ?? 'newest') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Search -->
                    <div>
                        <h3 class="font-semibold mb-4">Search Products</h3>
                        <form method="GET" class="space-y-2">
                            <input type="hidden" name="category_id" value="{{ $categoryId ?? '' }}">
                            <input type="hidden" name="min_price" value="{{ $minPrice ?? 0 }}">
                            <input type="hidden" name="max_price" value="{{ $maxPrice ?? 10000 }}">
                            <input type="hidden" name="sort" value="{{ $sort ?? 'newest' }}">
                            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search products..." class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#DB4444]">
                            <button type="submit" class="w-full bg-[#DB4444] text-white py-2 px-4 rounded hover:bg-red-600 transition">Search</button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div>
                        <h3 class="font-semibold mb-4">Categories</h3>
                        <form method="GET" class="space-y-2">
                            <input type="hidden" name="search" value="{{ $search ?? '' }}">
                            <input type="hidden" name="min_price" value="{{ $minPrice ?? 0 }}">
                            <input type="hidden" name="max_price" value="{{ $maxPrice ?? 10000 }}">
                            <input type="hidden" name="sort" value="{{ $sort ?? 'newest' }}">
                            <select name="category_id" onchange="this.form.submit()" class="w-full border border-gray-300 rounded px-4 py-2">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($categoryId ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <h3 class="font-semibold mb-4">Price Range</h3>
                        <form method="GET" class="space-y-4">
                            <input type="hidden" name="search" value="{{ $search ?? '' }}">
                            <input type="hidden" name="category_id" value="{{ $categoryId ?? '' }}">
                            <input type="hidden" name="sort" value="{{ $sort ?? 'newest' }}">
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Min Price</label>
                                <input type="number" name="min_price" value="{{ $minPrice ?? '' }}" min="0" step="1" placeholder="$0" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#DB4444] focus:border-transparent transition">
                            </div>
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Max Price</label>
                                <input type="number" name="max_price" value="{{ $maxPrice ?? '' }}" min="0" step="1" placeholder="$10000" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#DB4444] focus:border-transparent transition">
                            </div>
                            <button type="submit" class="w-full bg-[#DB4444] text-white py-3 px-4 rounded-lg font-medium hover:bg-red-600 transition-all duration-200 shadow-md hover:shadow-lg">Apply Filter</button>
                        </form>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:col-span-3">
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                            @foreach($products as $product)
                                <x-product-card :product="$product" />
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-12">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-center py-20">
                            <h3 class="text-2xl font-semibold mb-4">No products found</h3>
                            <p class="text-gray-500 mb-8">Try adjusting your filters or search terms.</p>
                            <a href="{{ route('shop.index') }}" class="bg-[#DB4444] text-white px-8 py-3 rounded hover:bg-red-600 transition">Clear Filters</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
