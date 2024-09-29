<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Table') }}
            </h2>

        </div>
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
            <div class="d-flex justify-content-between mb-3">
                <div><a href="#" class="btn btn-primary">Add</a></div>
                <div>

                </div>
            </div>
            <table class="table table-bordered" id="product_table">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Components</td>
                        <td>Monitor</td>
                        <td>Dahua LM22-B201S 21.45'' IPS 100Hz FHD Monitor</td>
                        <td>10,200</td>
                        <td>Active</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" onclick="return confirm('Are You Sure?')"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>

                    </tr>

                    <!-- Example Row -->
                    {{-- @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->category->name ?? '' }}</td>
                        <td>{{ $product->sub_category->name ?? '' }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="{{ $product->status == 1 ? 'text-primary' : 'text-danger' }}">
                            @if ($product->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('delete_product', $product->id) }}" onclick="return confirm('Are You Sure?')"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>

                    </tr>
                @endforeach --}}

                    <!-- Repeat rows as needed -->
                </tbody>
            </table>
        </div>
        <script src="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css"></script>
        <script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
        <!-- DataTables JS -->

        <!-- Initialize DataTable -->
        <script>
            $('#product_table').DataTable();
        </script>


    </x-slot>


</x-app-layout>
