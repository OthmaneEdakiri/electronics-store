@extends('layouts.admin')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-3xl font-bold text-gray-900">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h1>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            @switch($order->status)
                                @case('pending') bg-yellow-100 text-yellow-800 @break
                                @case('processing') bg-blue-100 text-blue-800 @break
                                @case('shipped') bg-purple-100 text-purple-800 @break
                                @case('delivered') bg-green-100 text-green-800 @break
                                @case('cancelled') bg-red-100 text-red-800 @break
                                @default bg-gray-100 text-gray-800
                            @endswitch">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm">Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                    &larr; Back to Orders
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Order Items -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Order Items</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($order->orderItems as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @if($item->product && $item->product->image_url)
                                                        <img src="{{ asset('storage/' . $item->product->image_url) }}" alt="{{ $item->product->name }}" class="h-12 w-12 object-cover rounded-lg mr-4">
                                                    @else
                                                        <div class="h-12 w-12 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">{{ $item->product->name ?? 'Unknown Product' }}</div>
                                                        @if($item->product)
                                                            <a href="{{ route('product.details', $item->product) }}" target="_blank" class="text-xs text-indigo-600 hover:text-indigo-900">View Product &rarr;</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $item->product ? number_format($item->product->price, 2) : '0.00' }} dh
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">
                                                {{ $item->product ? number_format($item->product->price * $item->quantity, 2) : '0.00' }} dh
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No items in this order.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    @if($order->payments->count() > 0)
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Payment Information</h2>
                            </div>
                            <div class="px-6 py-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    @foreach($order->payments as $payment)
                                        <div class="border rounded-lg p-4">
                                            <div class="flex justify-between mb-2">
                                                <span class="text-sm text-gray-500">Method</span>
                                                <span class="text-sm font-medium text-gray-900">{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</span>
                                            </div>
                                            <div class="flex justify-between mb-2">
                                                <span class="text-sm text-gray-500">Amount</span>
                                                <span class="text-sm font-medium text-gray-900">{{ number_format($payment->amount, 2) }} dh</span>
                                            </div>
                                            <div class="flex justify-between mb-2">
                                                <span class="text-sm text-gray-500">Status</span>
                                                <span class="text-sm font-medium">{{ ucfirst($payment->status) }}</span>
                                            </div>
                                            @if($payment->paid_at)
                                                <div class="flex justify-between">
                                                    <span class="text-sm text-gray-500">Paid At</span>
                                                    <span class="text-sm font-medium text-gray-900">{{ $payment->paid_at->format('M d, Y h:i A') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Customer Info -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Customer</h2>
                        </div>
                        <div class="px-6 py-4 space-y-3">
                            <div>
                                <span class="text-sm text-gray-500 block">Name</span>
                                <span class="text-sm font-medium text-gray-900">{{ $order->user->name ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500 block">Email</span>
                                <span class="text-sm font-medium text-gray-900">{{ $order->user->email ?? 'N/A' }}</span>
                            </div>
                            @if($order->user && $order->user->phone)
                                <div>
                                    <span class="text-sm text-gray-500 block">Phone</span>
                                    <span class="text-sm font-medium text-gray-900">{{ $order->user->phone }}</span>
                                </div>
                            @endif
                            @if($order->user && $order->user->address)
                                <div>
                                    <span class="text-sm text-gray-500 block">Address</span>
                                    <span class="text-sm font-medium text-gray-900">{{ $order->user->address }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Order Summary</h2>
                        </div>
                        <div class="px-6 py-4 space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Subtotal</span>
                                <span class="text-sm font-medium text-gray-900">{{ number_format($order->orderItems->sum(fn($item) => ($item->product->price ?? 0) * $item->quantity), 2) }} dh</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-500">Shipping</span>
                                <span class="text-sm font-medium text-gray-900">{{ number_format($order->total_price - $order->orderItems->sum(fn($item) => ($item->product->price ?? 0) * $item->quantity), 2) }} dh</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3 flex justify-between">
                                <span class="text-base font-semibold text-gray-900">Total</span>
                                <span class="text-base font-semibold text-gray-900">{{ number_format($order->total_price, 2) }} dh</span>
                            </div>
                        </div>
                    </div>

                    <!-- Update Status -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Update Status</h2>
                        </div>
                        <div class="px-6 py-4">
                            <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Order Status</label>
                                    <select name="status" id="status"
                                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md transition">
                                    Update Status
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

