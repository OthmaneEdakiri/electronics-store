<x-app-layout>
    <div class="container py-16 min-h-screen">
        <!-- Breadcrumb -->
        <div class="container mb-12">
            <x-breadcrumb label="Cart" />
        </div>

        @if(session('success'))
            <div class="mb-12 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Cart Table -->
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <!-- Table Header -->
                    <thead>
                        <tr class="shadow-[0px_1px_13px_0px_#0000000D]">
                            <th class="text-left py-6 px-10 font-normal">Product</th>
                            <th class="text-left py-6 px-10 font-normal">Price</th>
                            <th class="text-left py-6 px-10 font-normal">Quantity</th>
                            <th class="text-left py-6 px-10 font-normal">Subtotal</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <tr class="h-10"></tr>
                        @forelse($cartItems as $cartItem)
                            <tr class="shadow-[0px_1px_13px_0px_#0000000D]">
                                <td class="py-6 px-10">
                                    <div class="flex items-center gap-4">
                                        <div class="w-[54px] h-[54px] relative overflow-hidden">
                                            <img class="h-full w-full object-contain"
                                                src="{{asset('storage/' . $cartItem->product->image_url)}}"
                                                alt="{{$cartItem->product->name}}" class="w-full h-full object-cover">
                                        </div>
                                        <a
                                            href="{{ route("product.details", $cartItem->product) }}">{{$cartItem->product->name}}</a>
                                    </div>
                                </td>
                                <td class="py-6 px-10">{{ $cartItem->product->price }} dh</td>
                                <td class="py-6 px-10">
                                    <div data-cart-id="{{ $cartItem->id }}" class="relative w-[72px]">
                                        <input type="number" name="cart_items[{{ $cartItem->id }}]"
                                            value="{{ $cartItem->quantity }}" min="0" max="100"
                                            class="no-spinner qty h-[44px] w-full border-[1.5px] border-[#00000066] rounded-[4px] px-3 appearance-none" />

                                        <div class="absolute right-3 top-0 h-[44px] flex flex-col justify-center">
                                            <button type="button" data-action="increase"
                                                class="text-xs h-4 w-4 flex justify-center items-center">
                                                <svg width="9" height="6" viewBox="0 0 9 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.24267 1.88536L0.942667 5.18536L0 4.2427L4.24267 3.05176e-05L8.48533 4.2427L7.54267 5.18536L4.24267 1.88536Z"
                                                        fill="black" />
                                                </svg>
                                            </button>
                                            <button type="button" data-action="decrease"
                                                class="text-xs h-4 w-4 flex justify-center items-center">
                                                <svg width="9" height="6" viewBox="0 0 9 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.24268 3.3L7.54268 0L8.48535 0.942666L4.24268 5.18533L1.71661e-05 0.942666L0.942683 0L4.24268 3.3Z"
                                                        fill="black" />
                                                </svg>

                                            </button>
                                        </div>

                                    </div>
                                </td>
                                <td class="py-6 px-10 text-gray-800">{{$cartItem->product->price * $cartItem->quantity}} dh
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No Cart items found.
                                </td>
                            </tr>
                        @endforelse

                        <tr class="h-10"></tr>

                    </tbody>
                </table>
            </div>
            <!-- Cart Buttons -->
            <div class="flex flex-wrap justify-between items-center gap-4 mb-12">
                <a href="{{ route("shop.index") }}"
                    class="font-semibold border border-[#00000080] text-gray-700 px-8 h-14 flex items-center rounded-[4px] hover:bg-gray-100 transition duration-300">
                    Return To Shop
                </a>
                @if(count($cartItems) > 0)
                    <button type="submit"
                        class="font-semibold border border-[#00000080] text-gray-700 px-8 h-14 flex items-center rounded-[4px] hover:bg-gray-100 transition duration-300">
                        Update Cart
                    </button>
                @endif
            </div>
        </form>



        @if (count($cartItems) > 0)
            <!-- Cart Total -->
            <div class="border-[1.5px] border-black rounded-[4px] px-6 py-8 md:me-0 me-auto ms-auto max-w-[470px]">
                <h3 class="text-xl font-semibold mb-6">Cart Total</h3>

                <div class="space-y-4">
                    <!-- Subtotal -->
                    <div class="flex justify-between items-center">
                        <span>Subtotal:</span>
                        <span>${{ $subtotal }}</span>
                    </div>

                    <div class="h-[1px] bg-black w-full"></div>

                    <!-- Shipping -->
                    <div class="flex justify-between items-center">
                        <span>Shipping:</span>
                        <span>{{ $shipping === 0 ? "Free" : "$$shipping" }}</span>
                    </div>

                    <div class="h-[1px] bg-black w-full"></div>

                    <!-- Total -->
                    <div class="flex justify-between items-center">
                        <span>Total:</span>
                        <span class="font-bold text-xl">${{ $total }}</span>
                    </div>
                </div>

                <!-- Checkout Button -->
                <a href="{{ route("checkout") }}"
                    class="w-fit font-medium mx-auto bg-[#DB4444] text-white px-[48px] h-[56px] flex items-center rounded-[4px] hover:bg-red-600 transition duration-300 mt-6">
                    Proceeds to checkout
                </a>
            </div>
        @endif
    </div>


    @push('scripts')
        <script>
            document.addEventListener("click", function (e) {

                const button = e.target.closest("button[data-action]");

                if (!button) return;

                const action = button.dataset.action;

                const container = button.closest("[data-cart-id]");
                const input = container.querySelector(".qty");

                if (action === "increase") {
                    input.stepUp();
                }

                if (action === "decrease") {
                    input.stepDown();
                }

            });
        </script>
    @endpush

</x-app-layout>
