<x-app-layout>
    <div class="container py-16">
        <!-- Breadcrumb -->
        <div class="mb-12">
            <x-breadcrumb label="Contact" />
        </div>

        <!-- Contact Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Side - Contact Info -->
            <div class="lg:col-span-1">
                <div class="bg-white shadow-[0px_1px_13px_0px_#0000000D] rounded-[4px] px-[35px] py-10">
                    <!-- Call To Us -->
                    <div class="mb-8">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-10 h-10 bg-[#DB4444] rounded-full flex items-center justify-center">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.30521 4.99107L5.92221 1.08607C5.53221 0.636068 4.81721 0.638068 4.36421 1.09207L1.58221 3.87907C0.754209 4.70807 0.517209 5.93907 0.996209 6.92607C3.85783 12.851 8.63625 17.6362 14.5572 20.5061C15.5432 20.9851 16.7732 20.7481 17.6012 19.9191L20.4092 17.1061C20.8642 16.6511 20.8652 15.9321 20.4112 15.5421L16.4912 12.1771C16.0812 11.8251 15.4442 11.8711 15.0332 12.2831L13.6692 13.6491C13.5994 13.7223 13.5075 13.7705 13.4076 13.7864C13.3077 13.8023 13.2053 13.785 13.1162 13.7371C10.8867 12.4532 9.0372 10.6013 7.75621 8.37007C7.70824 8.28082 7.69087 8.17829 7.70676 8.07822C7.72266 7.97815 7.77094 7.88606 7.84421 7.81607L9.20421 6.45507C9.61621 6.04107 9.66121 5.40107 9.30521 4.99007V4.99107Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h3 class="font-semibold">Call To Us</h3>
                        </div>
                        <p class="text-[14px] mb-4">We are available 24/7, 7 days a week.</p>
                        <p class="text-[14px]">Phone: +8801611112222</p>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-8"></div>

                    <!-- Write To Us -->
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-10 h-10 bg-[#DB4444] rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-semibold">Write To US</h3>
                        </div>
                        <p class="text-[14px] mb-4">Fill out our form and we will contact you within 24 hours.</p>
                        <p class="text-[14px] mb-4">Emails: <a
                                href="mailto:customer@exclusive.com">customer@exclusive.com</a></p>
                        <p class="text-[14px]">Emails: <a href="mailto:support@exclusive.com">support@exclusive.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-[0px_1px_13px_0px_#0000000D] rounded-[4px] px-8 py-10">
                    <form class="space-y-6">
                        <!-- Name, Email, Phone Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <input type="text" placeholder="Your Name *"
                                    class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md focus:outline-none focus:border-red-500 transition-colors"
                                    required>
                            </div>
                            <div>
                                <input type="email" placeholder="Your Email *"
                                    class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md focus:outline-none focus:border-red-500 transition-colors"
                                    required>
                            </div>
                            <div>
                                <input type="tel" placeholder="Your Phone *"
                                    class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md focus:outline-none focus:border-red-500 transition-colors"
                                    required>
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <textarea rows="6" placeholder="Your Message"
                                class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md focus:outline-none focus:border-red-500 transition-colors resize-none"></textarea>
                        </div>

                        <!-- Send Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-[#DB4444] text-white px-12 py-4 rounded-md hover:bg-red-600 transition duration-300 font-medium">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
