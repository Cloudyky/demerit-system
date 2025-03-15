<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-8">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                            <h3 class="text-2xl font-semibold mb-3">{{ __('Personal Information') }}</h3>
                            <p><strong>Name:</strong> {{ $student->name }}</p>
                            <p><strong>IC:</strong> {{ $student->ic }}</p>
                            <p><strong>Gender:</strong> {{ $student->gender == 'P' ? 'Female' : 'Male' }}</p>
                            <p><strong>Kohort:</strong> {{ $student->kohort }}</p>
                            <p><strong>Class:</strong> {{ $student->class }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-4 flex items-center justify-center">
                    <div class="p-6 text-gray-900 text-center">
                        <h3 class="text-2xl font-semibold mb-3">{{ __('Merit Points') }}</h3>
                        <p class="text-4xl font-bold text-blue-600">{{ $student->merit_points }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <h3 class="text-2xl font-semibold mb-3">{{ __('Contribution Record') }}</h3>
                                <p>{{ __('No result for now') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <h3 class="text-2xl font-semibold mb-3">{{ __('Offense Record') }}</h3>
                                <p>{{ __('No result for now') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('students') }}" class="btn btn-secondary">Back to List</a>
                <div class="">
                    <button type="submit" class="btn btn-success">{{ __('Assign Contribute') }}</button>    
                    <button type="submit" class="btn btn-warning">{{ __('Assign Offense') }}</button>    
                    <button type="submit" class="btn btn-danger">{{ __('Remove') }}</button>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
