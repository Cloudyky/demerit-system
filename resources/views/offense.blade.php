<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offenses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center pb-4 flex-wrap gap-4">
                        <form class="flex items-center gap-2 w-full sm:w-auto" method="GET" action="{{ route('offense') }}">
                            @csrf
                            <select 
                                class="form-control rounded-lg w-full sm:w-64" 
                                id="sort" 
                                name="sort"
                                onchange="sortOffenses()">
                                <option value="highest">Demerit (Highest to Lowest)</option>
                                <option value="lowest">Demerit (Lowest to Highest)</option>
                            </select>
                        </form>
                        <button class="btn btn-secondary" onclick="printTable()">Print Table</button>
                    </div>

                    <div class="table-responsive">
                        <table id="offenseTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">{{ __('Id') }}</th>
                                    <th scope="col" class="text-center">{{ __('Offense') }}</th>
                                    <th scope="col" class="text-center">{{ __('Demerit Points') }}</th>
                                    <th scope="col" class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody id="offense-list">
                                @foreach ($offenses as $offense)
                                    <tr>
                                        <td class="text-center">{{ $offense->id }}</td>
                                        <td class="text-center">{{ $offense->jenis_kesalahan }}</td>
                                        <td class="text-center">{{ $offense->dimerit }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('offense.destroy', $offense) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this offense?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>

                                                <a href="{{ route('dashboard') }}">
                                                    <button type="button" class="btn btn-primary">{{ __('Edit') }}</button>
                                                </a>
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

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #offenseTable, #offenseTable * {
            visibility: visible;
        }

        #offenseTable {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
    }
</style>

<script>
    function sortOffenses() {
        const sortOrder = document.getElementById('sort').value;
        const tableBody = document.getElementById('offense-list');
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        rows.sort((a, b) => {
            const demeritA = parseInt(a.cells[2].innerText);
            const demeritB = parseInt(b.cells[2].innerText);
            return sortOrder === 'highest' ? demeritB - demeritA : demeritA - demeritB;
        });

        rows.forEach(row => tableBody.appendChild(row));
    }

    function printTable() {
        window.print();
    }
</script>
