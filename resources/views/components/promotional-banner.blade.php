<section class="bg-black text-white py-16">
    <div class="container mx-auto px-6 lg:ps-14 lg:pe-[60px]">

        <div class="grid lg:grid-cols-2 items-center gap-10">

            <!-- Left Content -->
            <div class="space-y-8">

                <!-- Category -->
                <span class="text-green-500 font-semibold">
                    Categories
                </span>

                <!-- Title -->
                <h1 class="text-4xl lg:text-5xl font-semibold leading-tight">
                    Enhance Your <br>
                    Music Experience
                </h1>

                <!-- Countdown -->
                <div class="flex gap-4">

                    <div
                        class="bg-white text-black w-[62px] h-[62px] rounded-full flex flex-col items-center justify-center">
                        <span id="days" class="font-semibold">00</span>
                        <span class="text-[11px]">Days</span>
                    </div>

                    <div
                        class="bg-white text-black w-[62px] h-[62px] rounded-full flex flex-col items-center justify-center">
                        <span id="hours" class="font-semibold">00</span>
                        <span class="text-[11px]">Hours</span>
                    </div>

                    <div
                        class="bg-white text-black w-[62px] h-[62px] rounded-full flex flex-col items-center justify-center">
                        <span id="minutes" class="font-semibold">00</span>
                        <span class="text-[11px]">Minutes</span>
                    </div>

                    <div
                        class="bg-white text-black w-[62px] h-[62px] rounded-full flex flex-col items-center justify-center">
                        <span id="seconds" class="font-semibold">00</span>
                        <span class="text-[11px]">Seconds</span>
                    </div>

                </div>

                <!-- Button -->
                <a href="{{ route("product.details", 4) }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-12 h-[56px] w-fit flex items-center rounded-[4px] font-medium transition">
                    Buy Now!
                </a>

            </div>


            <!-- Right Image -->
            <div class="relative flex justify-center lg:justify-end">

                <!-- Glow Effect -->
                <div class="absolute -top-4 w-[500px] h-[500px] bg-gray-100 rounded-full blur-[120px] opacity-40"></div>

                <!-- Speaker Image -->
                <img src="{{ asset('assets/img/jbl_boombox_refurbished.png') }}" alt="Speaker"
                    class="relative w-[568px] object-contain z-10">

            </div>

        </div>

    </div>
</section>

@push('scripts')
    <script>

        let targetDate = localStorage.getItem("offerEndDate");

        if (!targetDate) {

            const date = new Date();
            date.setDate(date.getDate() + 7);

            targetDate = date.getTime();

            localStorage.setItem("offerEndDate", targetDate);
        }

        targetDate = parseInt(targetDate);

        function updateCountdown() {

            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance <= 0) {
                document.getElementById("days").innerText = "00";
                document.getElementById("hours").innerText = "00";
                document.getElementById("minutes").innerText = "00";
                document.getElementById("seconds").innerText = "00";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;
        }

        setInterval(updateCountdown, 1000);

        updateCountdown();

    </script>
@endpush
