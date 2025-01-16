<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center pb-4 flex-wrap gap-4">
                        <form class="flex items-center gap-2 w-full sm:w-auto" method="GET" action="{{ route('students') }}">
                            @csrf
                            <input 
                                class="form-control rounded-lg w-full sm:w-96" 
                                type="search" 
                                name="search" 
                                placeholder="{{ __('Search by IC or Name') }}" 
                                aria-label="Search" 
                                value="{{ request('search') }}"> 
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                        <div class="flex gap-2">
                            <button class="btn btn-secondary" onclick="">All</button>
                            <button class="btn btn-secondary" onclick="">By Class</button>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by Merit
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick=""></a></li>
                                    <li><a class="dropdown-item" href="#" onclick=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
