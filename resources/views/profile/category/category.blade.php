<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Category') }}
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
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category">
                        Add
                    </button>

                    <div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="container mt-5">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- Modal -->
                    {{-- @yield('profile.add_products') --}}


                </div>
            </div>
            <table class="table table-bordered display" id="category_table">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                {{-- <button class="btn btn-warning" onclick="editProduct({{ $product }})"
                                    data-toggle="modal" data-target="#edit_product">Edit</button> --}}

                                <!-- Button trigger modal -->
                                <button class="btn btn-warning" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#edit_category{{ $category->id }}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit_category{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="container mt-5">

                                                    @if ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            <p class="alert alert-danger">{{ $error }}</p>
                                                        @endforeach
                                                    @endif
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Name *</label>
                                                        <input type="text" value="{{ $category->name }}"
                                                            name="name" class="form-control" value="">
                                                    </div>
                                                    
                                                   

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>



                                <a href="{{ route('category.destroy', $category->id) }}"
                                    onclick="return confirm('Are You Sure?')" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach

                    <!-- Repeat rows as needed -->
                </tbody>
            </table>
        </div>
        {{-- <div class="modal fade" id="category_import_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close bg-dark" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('import_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Demo File</label>
                        <a class="btn btn-primary" href="{{ asset('category_sample.csv') }}" role="button">Download</a>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Upload .xlsx/.csv files only</label>
                            <input type="file" name="file" class="form-control" name="excel" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

        <!-- jQuery -->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

        <!-- Initialize DataTable -->
        <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>


        {{-- <script>
        $('#category_table').DataTable({
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    </script> --}}
    </x-slot>
</x-app-layout>
