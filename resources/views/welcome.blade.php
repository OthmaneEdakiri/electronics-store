{{-- welcome.blade.php --}}
<x-app-layout>
    <!-- Hero Section with Full Width Slider -->
    <div class="relative w-full  py-10 overflow-hidden">
        <div class="container">
            <div class="pt-[58px] pb-[47px] px-16 bg-black relative min-h-[352px] overflow-hidden">
                <div class="flex flex-col gap-5 text-white">
                    <div class="flex items-center gap-6">
                        <img src="{{ asset("assets/img/apple-logo.png") }}" alt="">
                        <span>iPhone 14 Series</span>
                    </div>
                    <h2 class="max-w-[394px] text-5xl font-semibold">Up to 10% off Voucher</h2>
                    <a href="{{ route("shop.index", ["search" => "iphone 14"]) }}" class="inline-flex items-center text-white font-semibold group">
                        <span class="border-b border-[#fafafa] pb-1">Shop Now</span>
                        <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" width="18"
                            height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.75 7.75H17.25M17.25 7.75L10.25 0.75M17.25 7.75L10.25 14.75" stroke="#FAFAFA"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </div>
                <div class="absolute right-0 top-4 w-fit"><img class="h-[352px]"
                        src="{{ asset("assets/img/hero-image.jpg") }}" alt=""></div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="py-16">
        <div class="container">
            <!-- Header -->
            <div class="mb-[60px]">
                <h2 class="text-sm flex items-center gap-[10px] font-semibold text-[#DB4444] mb-5">
                    <span class="w-5 h-10 bg-[#DB4444]"></span>
                    Categories
                </h2>
                <div class="flex items-center justify-between">
                    <h3 class="text-[36px] leading-[48px] tracking-[4%] font-semibold text-gray-900">Browse By Category
                    </h3>
                    <div class="flex gap-2">
                        <button class="categories-prev w-[46px] h-[46px] rounded-full flex items-center justify-center bg-[#F5F5F5]">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 1L1 8L8 15M1 8H17" stroke="black" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button class="categories-next w-[46px] h-[46px] rounded-full flex items-center justify-center bg-[#F5F5F5]">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 7.75H17.25M17.25 7.75L10.25 0.75M17.25 7.75L10.25 14.75" stroke="black"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="swiper mySwiperCategories overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <x-category-card :category="$category" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.mySwiperCategories', {
                slidesPerView: 2,
                spaceBetween: 16,
                grabCursor: true,
                navigation: {
                    nextEl: '.categories-next',
                    prevEl: '.categories-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 16,
                    },
                },
            });
        });
    </script>
    @endpush

    <div class="h-[0.5px] opacity-30 bg-black max-w-[1130px] mx-auto"></div>

    <!-- Best Selling Products Section -->
    {{-- <div class="container py-16">
        <!-- Header -->
        <div class="mb-[60px]">
            <h2 class="text-sm flex items-center gap-[10px] font-semibold text-[#DB4444] mb-5">
                <span class="w-5 h-10 bg-[#DB4444]"></span>
                This Month
            </h2>
            <div class="flex items-center justify-between">
                <h3 class="text-[36px] leading-[48px] tracking-[4%] font-semibold text-gray-900">Best Selling Products
                </h3>
                <a href="#"
                    class="bg-[#DB4444] text-white px-12 py-4 rounded-[4px] hover:bg-red-600 transition duration-300">
                    View All
                </a>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <x-product-card title="The north coat" price="$260"
                image="https://via.placeholder.com/150x150/cccccc/666666?text=North+Coat" />
            <x-product-card title="The north coat" price="$260"
                image="https://via.placeholder.com/150x150/cccccc/666666?text=North+Coat" />
            <x-product-card title="The north coat" price="$260"
                image="https://via.placeholder.com/150x150/cccccc/666666?text=North+Coat" />
            <x-product-card title="The north coat" price="$260"
                image="https://via.placeholder.com/150x150/cccccc/666666?text=North+Coat" />
        </div>
    </div> --}}

    <div class="h-[0.5px] opacity-30 bg-black max-w-[1130px] mx-auto"></div>

    <!-- Music Experience Section -->
    <div class="container py-16">
        <x-promotional-banner />
    </div>

    <!-- Products Section -->
    <div class="py-16">
        <div class="container space-y-[60px]">
            <!-- Header -->
            <div class="mb-[60px]">
                <h2 class="text-sm flex items-center gap-[10px] font-semibold text-[#DB4444] mb-5"><span
                        class="w-5 h-10 bg-[#DB4444]"></span>Our Products</h2>
                <div class="flex items-center justify-between">
                    <h3 class="text-[36px] leading-[48px] tracking-[4%] font-semibold text-gray-900">Explore Our
                        Products</h3>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($allProducts as $product)
                    <x-product-card :product=$product />
                @endforeach
            </div>

            <div class="w-fit mx-auto">
                <a href="{{ route("shop.index") }}"
                    class="bg-[#DB4444] text-white px-12 py-4 rounded-[4px] hover:bg-red-600 transition duration-300">
                    View All
                </a>
            </div>
        </div>
    </div>



    <!-- Services Section -->
    <div class="pt-16 pb-[140px]">
        <div class="container">
            <x-services />
        </div>
    </div>

</x-app-layout>
