<x-app-layout>
<x-slot name="header">
    <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="container mt-5">
                        <div class="mb-3">
                            <label>Category *</label>
                            <select name = "category_id" id="category_id" class="form-control selectpicker"
                                data-live-search="true" required>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>

        </div>
    </div>



</x-app-layout>
