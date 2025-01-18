<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Offense') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-700 mb-4">
                        Offense ID: {{ $offense->id }}
                    </h3>

                    <form action="{{ route('offense.update', $offense->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Offense Field -->
                        <div class="mb-4">
                            <label for="offense" class="block text-sm font-medium text-gray-700">
                                Offense
                            </label>
                            <input
                                type="text"
                                id="offense"
                                name="offense"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                value="{{ old('offense', $offense->jenis_kesalahan) }}"
                                required
                            >
                            @error('offense')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Demerit Points Field -->
                        <div class="mb-4">
                            <label for="points" class="block text-sm font-medium text-gray-700">
                                Demerit Points
                            </label>
                            <input
                                type="number"
                                id="points"
                                name="points"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                value="{{ old('points', $offense->dimerit) }}"
                                required
                            >
                            @error('points')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button
                                type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                Update Offense
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
