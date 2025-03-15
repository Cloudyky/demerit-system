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
                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <form class="flex items-center gap-2 w-full sm:w-auto" method="GET" action="{{ route('students') }}">
                                @csrf
                                <input 
                                    class="form-control rounded-lg w-full sm:w-96" 
                                    type="search" 
                                    name="search" 
                                    placeholder="{{ __('Search by IC, Name or Class') }}" 
                                    aria-label="Search" 
                                    value="{{ request('search') }}"> 
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>
                            <a href="{{ route('students') }}">
                                <button class="btn btn-success">All</button>
                            </a>
                        </div>
                        <div class="flex gap-2 items-center">
                            
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by Merit
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="">Ascending</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="">Descending</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pb-4 flex-wrap gap-4">
                        <span class="text-gray-600">{{ $count }} Result Shown</span>
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
                                            <a href="{{ route('students.show', ['id' => $student->id, 'name' => urlencode($student->name)]) }}">
                                                <button type="button" class="btn btn-primary" style="margin-bottom: 2px;">{{ __('More') }}</button>
                                            </a>
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
