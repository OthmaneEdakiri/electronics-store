<x-app-layout>
    <div class="container pb-[140px]">
        <!-- Breadcrumb -->

        <div class="py-20">
            <x-breadcrumb label="Checkout" />
        </div>

        <!-- Checkout Grid -->
        <form action="{{ route("orders.store") }}" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @csrf
            <!-- Left Column - Billing Details Form -->
            <div>
                <h1 class="text-4xl font-medium mb-12">Billing Details</h1>

                <div class="space-y-5">
                    <!-- First Name -->
                    <div class="space-y-2">
                        <label class="opacity-40 leading-6" for="">Full Name<span class="text-red-500">*</span></label>
                        <div class="flex items-center w-full px-4 h-[50px] bg-[#f5f5f5] border-none rounded-[4px]">
                            {{ auth()->user()->name }}
                        </div>
                    </div>


                    <!-- Address -->
                    <div class="space-y-2">
                        <span class="opacity-40 leading-6">Address<span class="text-red-500">*</span></span>
                        <div class="flex items-center w-full px-4 h-[50px] bg-[#f5f5f5] border-none rounded-[4px]">
                            {{ auth()->user()->address }}
                        </div>
                    </div>


                    <!-- Phone Number -->
                    <div class="space-y-2">
                        <span class="opacity-40 leading-6">Phone Number<span class="text-red-500">*</span></span>
                        <div class="flex items-center w-full px-4 h-[50px] bg-[#f5f5f5] border-none rounded-[4px]">
                            {{ auth()->user()->phone }}
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label class="opacity-40 leading-6" for="">Email Address<span
                                class="text-red-500">*</span></label>
                        <div class="flex items-center w-full px-4 h-[50px] bg-[#f5f5f5] border-none rounded-[4px]">
                            {{ auth()->user()->email }}
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="py-8">
                <!-- Order Items -->
                <div class=" pb-4 mb-4">
                    @foreach ($cartItems as $item)
                        <div class="flex justify-between items-center py-3">
                            <div class="flex items-center gap-6">
                                <div class="relative h-[54px] w-[54px]"><img class="h-full w-full object-contain"
                                        src="{{ asset('storage/' . $item->product->image_url) }}" alt="" /></div>
                                <span class="text-gray-800 font-medium">{{ $item->product->name }}</span>
                            </div>
                            <span class="text-gray-800">{{ $item->product->price }} dh</span>
                        </div>
                    @endforeach
                </div>

                <!-- Order Totals -->
                <div>
                    <div class="flex justify-between items-center border-b py-4">
                        <span>Subtotal:</span>
                        <span>{{ $subtotal }} dh</span>
                    </div>
                    <div class="flex justify-between items-center border-b py-4">
                        <span>Shipping:</span>
                        <span>{{ $shipping == 0 ? "Free" : $shipping .
    "dh" }}</span>
                    </div>
                    <div class="flex justify-between items-center py-4">
                        <span class="">Total:</span>
                        <span class="">{{ $total }} dh</span>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="mb-6">
                    <div class="flex items-center justify-between gap-3 py-4">
                        <div class="flex items-center gap-4">
                            <input type="radio" name="payment_method" value="paypal" id="bank"
                                class="w-4 h-4 text-red-500 border-gray-300 focus:ring-red-500" checked>
                            <label for="bank">Paypal</label>
                        </div>
                        <div class="flex items-center gap-[9px]">
                            <img class="h-8" src="{{ asset("/assets/img/paypal.png") }}" alt="">
                        </div>
                    </div>
                    <div class="flex items-center gap-4 py-4">
                        <input type="radio" name="payment_method" value="cash_on_delivery" id="visa"
                            class="w-4 h-4 text-red-500 border-gray-300 focus:ring-red-500">
                        <label for="visa" class="flex items-center gap-2">
                            <span>Cash on delivery</span>
                        </label>
                    </div>
                </div>

                <!-- Place Order Button -->
                <button
                    class="max-w-[190px] w-full bg-red-500 text-white py-4 rounded-[4px] hover:bg-red-600 transition duration-300 font-medium">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
