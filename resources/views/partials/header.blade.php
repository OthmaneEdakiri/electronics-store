<header class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="{{ route("home") }}" class="text-2xl font-bold text-black">
                Exclusive
            </a>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route("home") }}" @class(['leadeing-[24px] border-b border-transparent tranition-colors', '!border-black' => request()->routeIs('home')]) class="">
                    Home
                </a>
                <a href="{{ route("contact") }}" @class(['leadeing-[24px] border-b border-transparent tranition-colors', '!border-black' => request()->routeIs('contact')]) class="">
                    Contact
                </a>
                <a href="{{ route("about") }}" @class(['leadeing-[24px] border-b border-transparent tranition-colors', '!border-black' => request()->routeIs('about')]) class="">
                    About
                </a>
                <a href="{{ route('shop.index') }}" @class(['leadeing-[24px] border-b border-transparent tranition-colors', '!border-black' => request()->routeIs('shop.index')]) class="">
                    Shop
                </a>
                @guest
                    <a href="{{ route("register") }}" @class(['leadeing-[24px] border-b border-transparent tranition-colors', '!border-black' => request()->routeIs('register') || request()->routeIs('login')])
                        class="">
                        Sign Up
                    </a>
                @endguest
            </nav>

            <!-- Right Section -->
            <div class="flex items-center space-x-6">

                <!-- Search -->
                <div class="relative hidden md:block">
                    <input type="text" placeholder="What are you looking for?"
                        class="bg-[#F5F5F5] w-64 pl-5 pr-10 h-[38px] text-sm border border-gray-200 rounded-[4px] focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    <svg class="absolute right-4 top-1/2 transform -translate-y-1/2" width="18" height="18"
                        viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.75 16.75L12.9723 12.9656M15.0658 7.90789C15.0658 9.80629 14.3117 11.6269 12.9693 12.9693C11.6269 14.3117 9.80629 15.0658 7.90789 15.0658C6.0095 15.0658 4.18886 14.3117 2.8465 12.9693C1.50413 11.6269 0.75 9.80629 0.75 7.90789C0.75 6.0095 1.50413 4.18886 2.8465 2.8465C4.18886 1.50413 6.0095 0.75 7.90789 0.75C9.80629 0.75 11.6269 1.50413 12.9693 2.8465C14.3117 4.18886 15.0658 6.0095 15.0658 7.90789V7.90789Z"
                            stroke="black" stroke-width="1.5" stroke-linecap="round" />
                    </svg>

                </div>

                <!-- Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Wishlist -->
                    <a href="{{ route("wishlist.index") }}" class="relative text-gray-700 hover:text-black">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.75 0.75C2.989 0.75 0.75 2.966 0.75 5.7C0.75 7.907 1.625 13.145 10.238 18.44C10.3923 18.5339 10.5694 18.5835 10.75 18.5835C10.9306 18.5835 11.1077 18.5339 11.262 18.44C19.875 13.145 20.75 7.907 20.75 5.7C20.75 2.966 18.511 0.75 15.75 0.75C12.989 0.75 10.75 3.75 10.75 3.75C10.75 3.75 8.511 0.75 5.75 0.75Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <!-- Wishlist Badge -->
                        @if($wishlistCount > 0)
                            <span
                                class="bg-[#DB4444] absolute -top-2 -right-2 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">
                                {{ $wishlistCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Cart -->
                    <a href="{{ route("cart.index") }}" class="relative text-gray-700 hover:text-black">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 5H7L10 22H26" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M10 16.6667H25.59C25.7056 16.6667 25.8177 16.6267 25.9072 16.5535C25.9966 16.4802 26.0579 16.3782 26.0806 16.2648L27.8806 7.26479C27.8951 7.19222 27.8934 7.11733 27.8755 7.04552C27.8575 6.97371 27.8239 6.90678 27.7769 6.84956C27.73 6.79234 27.6709 6.74625 27.604 6.71462C27.5371 6.68299 27.464 6.66661 27.39 6.66666H8"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <!-- Cart Badge -->
                        @if($cartCount > 0)
                            <span
                                class="bg-[#DB4444] absolute -top-1 -right-1 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                    @auth
                        <div class="relative">
                            <button type="button"
                                class="account-btn bg-[#DB4444] h-8 w-8 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="text-white">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </button>

                            <div
                                class="account-links z-20 text-[#FAFAFA] text-[14px] hidden flex-col gap-3 min-w-[224px] rounded-[4px] pt-[18px] pb-[10px] pl-5 pr-[10px] absolute top-[34px] right-0 bg-gradient-to-b from-gray-700 via-gray-800 to-black backdrop-blur-[150px]">
                                <a class="flex items-center gap-4" href="{{ route("profile.edit") }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-white">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Manage My Account
                                </a>
                                <a class="flex items-center gap-4" href="{{ route("orders.index") }}">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.75 4.55V18.75C0.75 19.0152 0.855357 19.2696 1.04289 19.4571C1.23043 19.6446 1.48478 19.75 1.75 19.75H17.75C18.0152 19.75 18.2696 19.6446 18.4571 19.4571C18.6446 19.2696 18.75 19.0152 18.75 18.75V4.55H0.75Z"
                                            stroke="#FAFAFA" stroke-width="1.5" stroke-linejoin="round" />
                                        <path
                                            d="M18.75 4.55L15.9165 0.75H3.5835L0.75 4.55M13.5275 7.85C13.5275 9.949 11.8365 11.65 9.75 11.65C7.6635 11.65 5.972 9.949 5.972 7.85"
                                            stroke="#FAFAFA" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                    My Orders
                                </a>
                                <a class="flex items-center gap-4" href="">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_856_454)">
                                            <path d="M8 16L12 12M16 8L11.9992 12M11.9992 12L8 8M12 12L16 16"
                                                stroke="#FAFAFA" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <circle cx="12" cy="12" r="11.25" stroke="white" stroke-width="1.5" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_856_454">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                    My Cancellations
                                </a>
                                <a class="flex items-center gap-4" href="">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.65186 1.20798C8.84066 0.597311 9.70524 0.597316 9.89404 1.20798L11.0913 5.08102C11.3697 5.9816 12.2024 6.59644 13.145 6.59665H17.1011C17.7243 6.59665 17.9905 7.38854 17.4937 7.76462L14.1636 10.2832C13.4419 10.8291 13.1395 11.7692 13.4067 12.6338L14.6597 16.6865C14.8464 17.2914 14.1457 17.7794 13.6431 17.3945L10.5806 15.0478C9.80909 14.4568 8.73681 14.4568 7.96533 15.0478L4.88623 17.4072C4.38421 17.7912 3.68452 17.3047 3.86963 16.7002L5.10498 12.665C5.36787 11.8064 5.06974 10.8742 4.35693 10.3281L1.00732 7.76266C0.514113 7.38483 0.78153 6.59665 1.40283 6.59665H5.40088C6.34348 6.59644 7.17617 5.9816 7.45459 5.08102L8.65186 1.20798Z"
                                            stroke="#FAFAFA" stroke-width="1.5" />
                                    </svg>
                                    My Reviews
                                </a>
                                <form method="POST" action="{{ route("logout") }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-4">
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.75 8.75H11.25M3.75 11.75L0.75 8.75L3.75 5.75M8.75 3.75V2.75C8.75 2.21957 8.96071 1.71086 9.33579 1.33579C9.71086 0.960714 10.2196 0.75 10.75 0.75H15.75C16.2804 0.75 16.7891 0.960714 17.1642 1.33579C17.5393 1.71086 17.75 2.21957 17.75 2.75V14.75C17.75 15.2804 17.5393 15.7891 17.1642 16.1642C16.7891 16.5393 16.2804 16.75 15.75 16.75H10.75C10.2196 16.75 9.71086 16.5393 9.33579 16.1642C8.96071 15.7891 8.75 15.2804 8.75 14.75V13.75"
                                                stroke="#FAFAFA" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

            </div>

        </div>
    </div>
</header>
