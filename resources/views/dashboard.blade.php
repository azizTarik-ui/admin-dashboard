<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        
        <table class="table table-bordered display" id="category_table">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
                {{-- @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->remarks }}</td>
                        <td class="{{ $category->status == 1 ? 'text-primary' : 'text-danger' }}">
                            @if ($category->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit_category', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('delete_category', $category->id) }}"
                                onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach --}}

                <!-- Repeat rows as needed -->
            </tbody>
        </table>
    </div>
    
    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

    <!-- Initialize DataTable -->


    <script>
        $('#category_table').DataTable({
        });
    </script>
    </div>
</x-app-layout>
