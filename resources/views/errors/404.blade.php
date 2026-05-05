<x-app-layout>
    <div class="container py-16 min-h-screen">
        <!-- Breadcrumb -->
        <div class="mb-[140px]">
            <x-breadcrumb label="404 Error" />
        </div>



        <div class="text-center">
            <h1 class="text-[110px] leading-[115px] font-medium tracking-[3%] mb-10">404 Not Found</h1>
            <p class="mb-20">Your visited page not found. You may go home page.</p>
            <a href="{{ route("home") }}"
                class="bg-[#DB4444] block w-fit mx-auto text-white px-12 py-4 rounded-md hover:bg-red-600 transition duration-300 font-medium">
                Back to home page
            </a>
        </div>
    </div>
</x-app-layout>
