<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Product') }}
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


            {{-- @yield('profile.add_products') --}}


            <div class="d-flex justify-content-between mb-3">
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_product">
                        Add
                    </button>

                    <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('products.store') }}" method="POST">
                                    @csrf
                                    <div class="container mt-5">
                                        <div class="mb-3">
                                            <label>Category *</label>
                                            <select name = "category_id" id="category_id"
                                                class="form-control selectpicker" data-live-search="true" required>
                                                <option value="">Select One</option>
                                                @if (!@empty($categories))
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="text" name="price" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="status">Status:</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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


            <table class="table table-bordered" id="product_table">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <!-- Example Row -->
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->category->name ?? '' }}</td>
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
                                {{-- <button class="btn btn-warning" onclick="editProduct({{ $product }})"
                                    data-toggle="modal" data-target="#edit_product">Edit</button> --}}

                                <!-- Button trigger modal -->
                                <button class="btn btn-warning" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#edit_product{{ $product->id }}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit_product{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('products.update', $product->id) }}" method="POST">
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
                                                        <label>Category</label>
                                                        <select name = "category_id" class="form-control">
                                                            @foreach ($categories as $category)
                                                                {{-- <option value="{{  $category->id }}">{{  $category->name }}</option> --}}
                                                                <option value="{{ $category->id }}"
                                                                    @if ($product->category_id == $category->id) selected @endif>
                                                                    {{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Name *</label>
                                                        <input type="text" value="{{ $product->name }}"
                                                            name="name" class="form-control" value="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Price *</label>
                                                        <input type="text" value="{{ $product->price }}"
                                                            name="price" class="form-control" value="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status">Status: *</label>
                                                        <select name="status" class="form-control">
                                                            {{-- <option value="1">Active</option>
                                                                                    <option value="0">Inactive</option> --}}
                                                            @if ($product->status == 1)
                                                                <option value="1">Active</option>
                                                                <option value="0">Inactive</option>
                                                            @else
                                                                <option value="0">Inactive</option>
                                                                <option value="1">Active</option>
                                                            @endif
                                                        </select>
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



                                <a href="{{ route('product.destroy', $product->id) }}"
                                    onclick="return confirm('Are You Sure?')" class="btn btn-danger">Delete</a>

                            </td>

                        </tr>
                    @endforeach

                    <!-- Repeat rows as needed -->
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close bg-dark" data-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="container mt-5">

                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf

                            {{-- @php
                $alphabets = ['a', 'b', 'c', 'd', 'e'];
            @endphp --}}

                            <div class="mb-3">
                                <label>Category *</label>
                                <select name = "category_id" id="category_id" class="form-control selectpicker"
                                    data-live-search="true" required>
                                    <option value="">Select One</option>
                                    @if (!@empty($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            {{-- <div class="mb-3 sub_cat_div">
                    <label>Sub-Category</label>
                    <select name = "sub_category_id" id="sub_category_id" class="form-control">
                        <option value="">Select One</option>
                        <option value="">HP</option>
                        <option value="">Ryzen</option>
                        <option value="">Nvidia</option>
                        <option value="">Corsair</option>
                        <option value="">Gigabyte</option>
                    </select>
                </div> --}}


                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <!-- Button trigger modal -->

        <script src="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css"></script>
        <script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
        <!-- DataTables JS -->

        <!-- Initialize DataTable -->



    </x-slot>


</x-app-layout>
