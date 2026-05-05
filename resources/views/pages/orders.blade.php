<x-app-layout>
    <div class="py-20">
        <!-- Breadcrumb -->
        <div class="container mb-12">
            <x-breadcrumb label="My Orders" />
        </div>

        @if(session('success'))
            <div class="container mb-12 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg max-w-2xl mx-auto" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="container">
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h1 class="text-4xl font-semibold text-gray-900 mb-2">My Orders</h1>
                    <p class="text-gray-500">Here's a list of your recent orders.</p>
                </div>
            </div>

            <!-- Orders Table -->
            @if(count($orders) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="shadow-[0px_1px_13px_0px_#0000000D]">
                                <th class="text-left py-6 px-6 font-normal">Order</th>
                                <th class="text-left py-6 px-6 font-normal">Date</th>
                                <th class="text-left py-6 px-6 font-normal">Status</th>
                                <th class="text-left py-6 px-6 font-normal">Total</th>
                                <th class="text-left py-6 px-6 font-normal w-32">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr class="h-4"></tr>
                                <tr class="shadow-[0px_1px_13px_0px_#0000000D]">
                                    <td class="py-6 px-6">
                                        <span class="font-semibold">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td class="py-6 px-6">
                                        <span class="text-gray-700">{{ $order->created_at->format('M d, Y') }}</span>
                                    </td>
                                    <td class="py-6 px-6">
                                        <x-orders-status
                                            :status="$order->status"
                                            :class="match($order->status) {
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'processing' => 'bg-blue-100 text-blue-800',
                                                'shipped' => 'bg-purple-100 text-purple-800',
                                                'delivered' => 'bg-green-100 text-green-800',
                                                'cancelled' => 'bg-red-100 text-red-800',
                                                default => 'bg-gray-100 text-gray-800'
                                            }"
                                        />
                                    </td>
                                    <td class="py-6 px-6">
                                        <span class="font-semibold text-gray-900">{{ number_format($order->total_price, 2) }} dh</span>
                                    </td>
                                    <td class="py-6 px-6">
                                        <div class="flex items-center gap-2">
                                            <button onclick="toggleOrderDetails({{ $order->id }})" class="text-[#DB4444] hover:text-red-600 font-medium text-sm">View Details</button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Order Details Row (Hidden by default) -->
                                <tr id="details-{{ $order->id }}" class="details-row hidden">
                                    <td colspan="5" class="py-8 px-6 bg-gray-50">
                                        <div class="max-w-4xl mx-auto">
                                            <!-- Items Table -->
                                            <h3 class="text-xl font-semibold mb-6">Order Items</h3>
                                            @if($order->orderItems->count() > 0)
                                                <div class="overflow-x-auto mb-8">
                                                    <table class="w-full border-collapse">
                                                        <thead>
                                                            <tr class="shadow-[0px_1px_13px_0px_#0000000D]">
                                                                <th class="text-left py-4 px-6 font-normal">Product</th>
                                                                <th class="text-left py-4 px-6 font-normal">Price</th>
                                                                <th class="text-left py-4 px-6 font-normal">Quantity</th>
                                                                <th class="text-left py-4 px-6 font-normal">Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($order->orderItems as $item)
                                                                <tr class="shadow-[0px_1px_13px_0px_#0000000D]">
                                                                    <td class="py-6 px-6">
                                                                        <div class="flex items-center gap-4">
                                                                            <div class="w-[54px] h-[54px] relative overflow-hidden rounded-lg">
                                                                                <img class="w-full h-full object-cover"
                                                                                     src="{{ asset('storage/' . $item->product->image_url) }}"
                                                                                     alt="{{ $item->product->name }}">
                                                                            </div>
                                                                            <div>
                                                                                <a href="{{ route('product.details', $item->product) }}" class="font-medium hover:text-[#DB4444]">{{ $item->product->name }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="py-6 px-6">{{ number_format($item->product->price, 2) }} dh</td>
                                                                    <td class="py-6 px-6 font-medium">{{ $item->quantity }}</td>
                                                                    <td class="py-6 px-6 font-semibold">{{ number_format($item->product->price * $item->quantity, 2) }} dh</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Order Summary -->
                                                <div class="border-[1.5px] border-black rounded-[4px] px-6 py-8 max-w-md">
                                                    <h4 class="text-lg font-semibold mb-4">Order Summary</h4>
                                                    <div class="space-y-3 mb-6">
                                                        <div class="flex justify-between">
                                                            <span>Subtotal:</span>
                                                            <span>{{ $order->orderItems->sum(fn($item) => $item->product->price * $item->quantity) }} dh</span>
                                                        </div>
                                                        <div class="h-[1px] bg-black w-full"></div>
                                                        <div class="flex justify-between font-semibold text-lg">
                                                            <span>Total:</span>
                                                            <span>${{ number_format($order->total_price, 2) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-gray-500 text-center py-12">No items in this order.</p>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-20">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-gray-900">No orders yet</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">You haven't placed any orders yet. Start shopping to see your order history here.</p>
                    <a href="{{ route('shop.index') }}" class="bg-[#DB4444] text-white px-8 py-4 rounded-lg font-medium hover:bg-red-600 transition duration-300 inline-block">Start Shopping</a>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleOrderDetails(orderId) {
            const row = document.getElementById(`details-${orderId}`);
            const button = event.target;

            if (row.classList.contains('hidden')) {
                row.classList.remove('hidden');
                button.textContent = 'Hide Details';
            } else {
                row.classList.add('hidden');
                button.textContent = 'View Details';
            }
        }
    </script>
    @endpush
</x-app-layout>
