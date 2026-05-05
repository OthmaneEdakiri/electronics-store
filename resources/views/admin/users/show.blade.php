@extends('layouts.admin')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div class="flex items-center gap-4">
                    <div class="h-16 w-16 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-600 font-bold text-xl">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                    &larr; Back to Users
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- User Info -->
                <div class="space-y-6">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">User Information</h2>
                        </div>
                        <div class="px-6 py-4 space-y-4">
                            <div>
                                <span class="text-sm text-gray-500 block">Full Name</span>
                                <span class="text-sm font-medium text-gray-900">{{ $user->name }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500 block">Email Address</span>
                                <span class="text-sm font-medium text-gray-900">{{ $user->email }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500 block">Phone Number</span>
                                <span class="text-sm font-medium text-gray-900">{{ $user->phone ?? 'Not provided' }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500 block">Address</span>
                                <span class="text-sm font-medium text-gray-900">{{ $user->address ?? 'Not provided' }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500 block">Email Verified</span>
                                <span class="text-sm font-medium">
                                    @if($user->email_verified_at)
                                        <span class="text-green-600">{{ $user->email_verified_at->format('M d, Y h:i A') }}</span>
                                    @else
                                        <span class="text-yellow-600">Not verified</span>
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500 block">Registered</span>
                                <span class="text-sm font-medium text-gray-900">{{ $user->created_at->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Actions</h2>
                        </div>
                        <div class="px-6 py-4">
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md transition">
                                    Delete User
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- User Orders -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-900">Order History</h2>
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                {{ $user->orders->count() }} Orders
                            </span>
                        </div>
                        <div class="overflow-x-auto">
                            @if($user->orders->count() > 0)
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($user->orders as $order)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $order->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
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
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">
                                                    {{ number_format($order->total_price, 2) }} dh
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No orders</h3>
                                    <p class="mt-1 text-sm text-gray-500">This user hasn't placed any orders yet.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

