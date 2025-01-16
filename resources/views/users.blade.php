<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center pb-4 flex-wrap gap-4">
                        <form class="flex items-center gap-2 w-full sm:w-auto" method="GET" action="{{ route('users') }}">
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
                            <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register New User</a>
                            <button class="btn btn-secondary" onclick="printTable()">Print Table</button>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Save Table
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="saveTable()">Excel</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="saveTableAsPDF()">PDF</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="userTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Id</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Ic</th>
                                    <th scope="col" class="text-center">Role</th>
                                    <th scope="col" class="text-center action-col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $user->id }}</th>
                                        <td class="text-center">{{ $user->name }}
                                            @if ($user->name === Auth::User()->name)
                                                (You)
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->ic }}</td>
                                        <td class="text-center">{{ $user->role }}</td>
                                        <td class="text-center action-col">
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                
                                                @if ($user->name !== Auth::User()->name)
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                @endif
                                                
                                                <a href="{{ route('dashboard') }}">
                                                    <button type="button" class="btn btn-primary">More</button>
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

        #userTable, #userTable * {
            visibility: visible;
        }

        #userTable {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        /* Hide the action column for printing */
        #userTable .action-col,
        #userTable .action-col * {
            display: none;
        }
    }

    @media (max-width: 768px) { /* Adjust for mobile view */
        #userTable th:nth-child(3), /* Email */
        #userTable td:nth-child(3), /* Email */
        #userTable th:nth-child(5), /* Role */
        #userTable td:nth-child(5)  /* Role */ {
            display: none;
        }
    }
</style>

<script>
    function printTable() {
        window.print();
    }

    function saveTable() {
        const table = document.getElementById("userTable");
        const rows = Array.from(table.querySelectorAll("tbody tr")).map(row => {
            const cells = Array.from(row.querySelectorAll("td:not(.action-col), th:not(.action-col)"));
            return cells.map(cell => cell.innerText);
        });

        const headers = ["Id", "Name", "Email", "Ic", "Role"];

        const data = [headers, ...rows];

        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(wb, ws, "Users");

        XLSX.writeFile(wb, "Users.xlsx");
    }

    function saveTableAsPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const table = document.getElementById("userTable");
        const rows = Array.from(table.querySelectorAll("tbody tr")).map(row => {
            const cells = Array.from(row.querySelectorAll("th:not(.action-col), td:not(.action-col)"));
            return cells.map(cell => cell.innerText);
        });

        const headers = ["Id", "Name", "Email", "Ic", "Role"];

        doc.autoTable({
            head: [headers],
            body: rows,
            startY: 20,
            styles: {
                overflow: 'linebreak',
                halign: 'center',
            },
            columnStyles: {
                0: { halign: 'center' }, // ID column
                1: { halign: 'left' },   // Name column
                2: { halign: 'left' },   // Email column
                3: { halign: 'center' }, // IC column
                4: { halign: 'center' }  // Role column
            },
        });

        doc.save('Users.pdf');
    }
</script>
