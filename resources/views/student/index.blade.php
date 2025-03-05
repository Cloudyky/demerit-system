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
                                class="form-control rounded-lg w-full sm:w-96 border border-gray-300 px-4 py-2" 
                                type="search" 
                                name="search" 
                                placeholder="{{ __('Search by IC, Name or Class') }}" 
                                aria-label="Search" 
                                value="{{ request('search') }}"> 
                            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                {{ __('Search') }}
                            </button>
                        </form>
                        <div class="flex gap-2 flex-wrap">
                            <a href="{{ route('students') }}">
                                <button class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                                    {{ __('All') }}
                                </button>
                            </a>
                            
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                {{ __('By Class') }}
                            </button>

                            <form method="GET" action="{{ route('offense') }}">
                                @csrf
                                <select 
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300"
                                    id="sort" 
                                    name="sort"
                                    onchange="sortOffenses()">
                                    <option value="highest">{{ __('Merit') }}</option>
                                    <option value="highest">{{ __('Merit (Highest)') }}</option>
                                    <option value="lowest">{{ __('Merit (Lowest)') }}</option>
                                </select>
                            </form>
                        </div>
                    </div> 

                    <div class="table-responsive">
                        <table id="userTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Id</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Ic</th>
                                    <th scope="col" class="text-center">Gender</th>
                                    <th scope="col" class="text-center">Kohort</th>
                                    <th scope="col" class="text-center">Class</th>
                                    <th scope="col" class="text-center">Merit Points</th>
                                    <th scope="col" class="text-center action-col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $student->id }}</th>
                                        <td class="text-center">{{ $student->name }}</td>
                                        <td class="text-center">{{ $student->ic }}</td>
                                        <td class="text-center">{{ $student->gender }}</td>
                                        <td class="text-center">{{ $student->kohort }}</td>
                                        <td class="text-center">{{ $student->class }}</td>
                                        <td class="text-center">{{ $student->merit_points }}</td>
                                        <td class="text-center action-col">
                                            <form action="" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this contribution?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <a href="">
                                                    <button type="button" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                                        {{ __('More') }}
                                                    </button>
                                                </a>

                                                @if (Auth::user() && Auth::user()->role === 'admin')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                                        {{ __('Delete') }}
                                                    </button>
                                                @endif

                                            </form>
                                        </td>
                                    </tr>        
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
