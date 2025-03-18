<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-6">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <h3 class="text-2xl font-semibold mb-3">{{ __('Personal Information') }}</h3>
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>IC:</strong> {{ $user->ic }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p>
                                    <strong>Role:</strong> 
                                    @if($user->role == 'user')
                                        User
                                    @else($user->role == 'admin')
                                        Admin
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-3 flex items-center justify-center">
                    <div class="p-6 text-gray-900 text-center">
                        <h3 class="text-2xl font-semibold mb-3">{{ __('Merit Given') }}</h3>
                        <p class="text-4xl font-bold text-blue-600">0</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-3 flex items-center justify-center">
                    <div class="p-6 text-gray-900 text-center">
                        <h3 class="text-2xl font-semibold mb-3">{{ __('Merit Deducated') }}</h3>
                        <p class="text-4xl font-bold text-red-600">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div x-data="{ open: false }">
                        <div @click="open = !open" class="flex justify-between items-center cursor-pointer">
                            <h3 class="text-2xl font-semibold">{{ __('Contribution Assigned') }}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.16l3.71-3.03a.75.75 0 011.04 1.08l-4.24 3.47a.75.75 0 01-1.04 0L5.23 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-show="open" class="mt-3">
                            <p>{{ __('No result found') }}</p>
                            <div class="">
                                {{-- isi kat sini --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <div x-data="{ open: false }">
                        <div @click="open = !open" class="flex justify-between items-center cursor-pointer">
                            <h3 class="text-2xl font-semibold">{{ __('Offense Assigned') }}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.16l3.71-3.03a.75.75 0 011.04 1.08l-4.24 3.47a.75.75 0 01-1.04 0L5.23 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-show="open" class="mt-3">
                            <p>{{ __('No result found') }}</p>
                            <div class="">
                                {{-- isi kat sini --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('users') }}" class="btn btn-secondary">Back to List</a>
                @if ($user->name !== Auth::User()->name)
                    <form action="{{ route('users.remove', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure want to remove {{ $user->name }} from user list?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Remove') }}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
