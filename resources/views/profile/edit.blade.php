<x-app-layout>

    <div class="container pb-[140px]">

        <!-- Breadcrumb -->
        <div class="py-20 flex justify-between text-sm text-gray-500">
            <div>
                Home / <span class="text-black">My Account</span>
            </div>

            <div>
                Welcome! <span class="text-red-500 font-medium">{{ $user->name }}</span>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-10">

            <!-- Sidebar -->
            <div class="col-span-3">

                <div class="space-y-6 text-sm">

                    <div>
                        <h3 class="font-medium mb-4">Manage My Account</h3>

                        <ul class="ps-9 space-y-1 text-gray-500">
                            <li class="text-red-500">My Profile</li>
                            <li>Address Book</li>
                            <li>My Payment Options</li>
                        </ul>
                    </div>


                    <div>
                        <h3 class="font-medium mb-4">My Orders</h3>

                        <ul class="ps-9 space-y-1 text-gray-500">
                            <li>My Returns</li>
                            <li>My Cancellations</li>
                        </ul>
                    </div>


                    <div>
                        <h3 class="font-medium">My Wishlist</h3>
                    </div>

                </div>

            </div>


            <!-- Profile Form -->
            <div class="col-span-9">

                @if (session('status') === 'profile-updated')
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">Profile updated successfully!</span>
                        </div>
                    </div>
                @endif

                <div class="bg-white shadow-[0px_1px_13px_0px_#0000000D] rounded-[4px] py-10 px-20">

                    <h2 class="text-red-500 font-medium text-xl mb-4">
                        Edit Your Profile
                    </h2>

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name & Email -->
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block font-medium text-sm text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block font-medium text-sm text-gray-700 mb-1">Address</label>
                            <input id="address" name="address" type="text" value="{{ old('address', $user->address) }}" class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('address') border-red-500 @enderror">
                            @error('address')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block font-medium text-sm text-gray-700 mb-1">Phone Number</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone', $user->phone) }}" class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Change (Optional) -->
                        <div class="space-y-4">
                            <h3 class="font-medium text-gray-900">Password Change (Leave blank to keep current)</h3>
                            <div>
                                <label for="current_password" class="block font-medium text-sm text-gray-700 mb-1">Current Password</label>
                                <input id="current_password" name="current_password" type="password" class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('current_password') border-red-500 @enderror">
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="new_password" class="block font-medium text-sm text-gray-700 mb-1">New Password</label>
                                <input id="new_password" name="new_password" type="password" class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 @error('new_password') border-red-500 @enderror">
                                @error('new_password')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="new_password_confirmation" class="block font-medium text-sm text-gray-700 mb-1">Confirm New Password</label>
                                <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="w-full mt-1 border border-gray-300 rounded-[4px] px-4 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-4 pt-6">
                            <a href="{{ route('profile.edit') }}" class="px-8 py-3 border border-gray-300 text-gray-700 rounded-[4px] hover:bg-gray-50 transition">Cancel</a>
                            <button type="submit" class="bg-[#DB4444] hover:bg-red-600 font-medium text-white px-12 h-[56px] rounded-[4px] transition-all shadow-md hover:shadow-lg">Save Changes</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
