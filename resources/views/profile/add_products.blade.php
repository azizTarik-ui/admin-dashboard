<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Add New Product') }}
            </h2>

        </div>
        <div class="container mt-5">

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                {{-- @php
                $alphabets = ['a', 'b', 'c', 'd', 'e'];
            @endphp --}}

                <div class="mb-3">
                    <label>Category *</label>
                    <select name = "category_id" id="category_id" class="form-control selectpicker" data-live-search="true"
                        required>
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
    </x-slot>
</x-app-layout>
