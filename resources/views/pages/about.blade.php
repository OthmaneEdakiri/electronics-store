<x-app-layout>
    <!-- About Us Section -->
    <div class="py-16">
        <!-- Breadcrumb -->
        <div class="container">
            <div class="mb-12">
                <x-breadcrumb label="About" />
            </div>
        </div>

        <!-- Content Grid -->
        <div class="max-w-[calc(1170px+((100%-1170px)/2))] ps-[20px] ms-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Text Content -->
                <div>
                    <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 mb-8">Our Story</h1>
                    <div class="space-y-6 text-gray-600 leading-relaxed">
                        <p>
                            Launched in 2015, Exclusive is South Asia's premier online shopping marketplace with an
                            active
                            presence in Bangladesh. Supported by wide range of tailored marketing, data and service
                            solutions, Exclusive has 10,500 sellers and 300 brands and serves 3 millions customers
                            across
                            the region.
                        </p>
                        <p>
                            Exclusive has more than 1 Million products to offer, growing at a very fast. Exclusive
                            offers a
                            diverse assortment in categories ranging from consumer.
                        </p>
                    </div>
                </div>

                <!-- Right Column - Image -->
                <div class="overflow-hidden">
                    <img src="{{ asset('assets/img/about-image.jpg') }}" alt="About Exclusive"
                        class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="container py-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div
                class="text-center border border-[#0000004D] rounded-[4px] py-[30px] hover:bg-[#DB4444] hover:text-white group transition-colors duration-300 cursor-pointer">
                <div
                    class="w-20 h-20 border-[10px] border-gray-300 group-hover:border-[#2F2E30] group-hover:border-opacity-30 bg-black group-hover:bg-white rounded-full flex items-center justify-center mx-auto mb-6 transition-colors duration-300">
                    <svg class="stroke-[#FAFAFA] group-hover:stroke-[black] transition-colors duration-300" width="40"
                        height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_826_272)">
                            <path
                                d="M11.6667 31.6667C13.5076 31.6667 15 30.1743 15 28.3333C15 26.4924 13.5076 25 11.6667 25C9.82573 25 8.33334 26.4924 8.33334 28.3333C8.33334 30.1743 9.82573 31.6667 11.6667 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8.33331 28.3335H6.99998C5.89541 28.3335 4.99998 27.4381 4.99998 26.3335V21.6668M3.33331 8.3335H19.6666C20.7712 8.3335 21.6666 9.22893 21.6666 10.3335V28.3335M15 28.3335H25M31.6667 28.3335H33C34.1046 28.3335 35 27.4381 35 26.3335V18.3335M35 18.3335H21.6666M35 18.3335L30.5826 10.9712C30.2211 10.3688 29.5701 10.0002 28.8676 10.0002H21.6666"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5 11.8184H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1.81818 15.4546H8.48484" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 19.0908H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_826_272">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <div class="text-3xl font-bold text-gray-900 group-hover:text-white mb-2">10.5k</div>
                <div class="text-gray-500 group-hover:text-white/90">Sallers active our site</div>
            </div>
            <div
                class="text-center border border-[#0000004D] rounded-[4px] py-[30px] hover:bg-[#DB4444] hover:text-white group transition-colors duration-300 cursor-pointer">
                <div
                    class="w-20 h-20 border-[10px] border-gray-300 group-hover:border-[#2F2E30] group-hover:border-opacity-30 bg-black group-hover:bg-white rounded-full flex items-center justify-center mx-auto mb-6 transition-colors duration-300">
                    <svg class="stroke-[#FAFAFA] group-hover:stroke-[black] transition-colors duration-300" width="40"
                        height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_826_272)">
                            <path
                                d="M11.6667 31.6667C13.5076 31.6667 15 30.1743 15 28.3333C15 26.4924 13.5076 25 11.6667 25C9.82573 25 8.33334 26.4924 8.33334 28.3333C8.33334 30.1743 9.82573 31.6667 11.6667 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8.33331 28.3335H6.99998C5.89541 28.3335 4.99998 27.4381 4.99998 26.3335V21.6668M3.33331 8.3335H19.6666C20.7712 8.3335 21.6666 9.22893 21.6666 10.3335V28.3335M15 28.3335H25M31.6667 28.3335H33C34.1046 28.3335 35 27.4381 35 26.3335V18.3335M35 18.3335H21.6666M35 18.3335L30.5826 10.9712C30.2211 10.3688 29.5701 10.0002 28.8676 10.0002H21.6666"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5 11.8184H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1.81818 15.4546H8.48484" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 19.0908H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_826_272">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <div class="text-3xl font-bold text-gray-900 group-hover:text-white mb-2">10.5k</div>
                <div class="text-gray-500 group-hover:text-white/90">Sallers active our site</div>
            </div>
            <div
                class="text-center border border-[#0000004D] rounded-[4px] py-[30px] hover:bg-[#DB4444] hover:text-white group transition-colors duration-300 cursor-pointer">
                <div
                    class="w-20 h-20 border-[10px] border-gray-300 group-hover:border-[#2F2E30] group-hover:border-opacity-30 bg-black group-hover:bg-white rounded-full flex items-center justify-center mx-auto mb-6 transition-colors duration-300">
                    <svg class="stroke-[#FAFAFA] group-hover:stroke-[black] transition-colors duration-300" width="40"
                        height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_826_272)">
                            <path
                                d="M11.6667 31.6667C13.5076 31.6667 15 30.1743 15 28.3333C15 26.4924 13.5076 25 11.6667 25C9.82573 25 8.33334 26.4924 8.33334 28.3333C8.33334 30.1743 9.82573 31.6667 11.6667 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8.33331 28.3335H6.99998C5.89541 28.3335 4.99998 27.4381 4.99998 26.3335V21.6668M3.33331 8.3335H19.6666C20.7712 8.3335 21.6666 9.22893 21.6666 10.3335V28.3335M15 28.3335H25M31.6667 28.3335H33C34.1046 28.3335 35 27.4381 35 26.3335V18.3335M35 18.3335H21.6666M35 18.3335L30.5826 10.9712C30.2211 10.3688 29.5701 10.0002 28.8676 10.0002H21.6666"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5 11.8184H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1.81818 15.4546H8.48484" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 19.0908H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_826_272">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <div class="text-3xl font-bold text-gray-900 group-hover:text-white mb-2">10.5k</div>
                <div class="text-gray-500 group-hover:text-white/90">Sallers active our site</div>
            </div>
            <div
                class="text-center border border-[#0000004D] rounded-[4px] py-[30px] hover:bg-[#DB4444] hover:text-white group transition-colors duration-300 cursor-pointer">
                <div
                    class="w-20 h-20 border-[10px] border-gray-300 group-hover:border-[#2F2E30] group-hover:border-opacity-30 bg-black group-hover:bg-white rounded-full flex items-center justify-center mx-auto mb-6 transition-colors duration-300">
                    <svg class="stroke-[#FAFAFA] group-hover:stroke-[black] transition-colors duration-300" width="40"
                        height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_826_272)">
                            <path
                                d="M11.6667 31.6667C13.5076 31.6667 15 30.1743 15 28.3333C15 26.4924 13.5076 25 11.6667 25C9.82573 25 8.33334 26.4924 8.33334 28.3333C8.33334 30.1743 9.82573 31.6667 11.6667 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8.33331 28.3335H6.99998C5.89541 28.3335 4.99998 27.4381 4.99998 26.3335V21.6668M3.33331 8.3335H19.6666C20.7712 8.3335 21.6666 9.22893 21.6666 10.3335V28.3335M15 28.3335H25M31.6667 28.3335H33C34.1046 28.3335 35 27.4381 35 26.3335V18.3335M35 18.3335H21.6666M35 18.3335L30.5826 10.9712C30.2211 10.3688 29.5701 10.0002 28.8676 10.0002H21.6666"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5 11.8184H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1.81818 15.4546H8.48484" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 19.0908H11.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_826_272">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>
                <div class="text-3xl font-bold text-gray-900 group-hover:text-white mb-2">10.5k</div>
                <div class="text-gray-500 group-hover:text-white/90">Sallers active our site</div>
            </div>

        </div>
    </div>

    <!-- Team Section -->
    <div class="py-16">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-4">
                <x-team-card :image="asset('assets/img/team-1.png')" job="Founder & Chairman" name="Tom Cruise" />
                <x-team-card :image="asset('assets/img/team-2.png')" job="Managing Director" name="Emma Watson" />
                <x-team-card :image="asset('assets/img/team-3.png')" job="Product Designer" name="Will Smith" />
            </div>
        </div>
    </div>


    <div class="pt-16 pb-[140px]">
        <div class="container">
            <x-services />
        </div>
    </div>

</x-app-layout>
