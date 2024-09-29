<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Form') }}
            </h2>

        </div>
        <div class="container mt-5">

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- @php
                $alphabets = ['a', 'b', 'c', 'd', 'e'];
            @endphp --}}

                <div class="mb-3">
                    <label>Category *</label>
                    <select name = "category_id" id="category_id" class="form-control selectpicker" required>
                        <option value="">Select One</option>
                        <option value="">Monitor</option>
                        <option value="">CPU</option>
                        <option value="">GPU</option>
                        <option value="">RAM</option>
                        <option value="">Motherboard</option>
                    </select>
                </div>
                <div class="mb-3 sub_cat_div">
                    <label>Sub-Category</label>
                    <select name = "sub_category_id" id="sub_category_id" class="form-control">
                        <option value="">Select One</option>
                        <option value="">HP</option>
                        <option value="">Ryzen</option>
                        <option value="">Nvidia</option>
                        <option value="">Corsair</option>
                        <option value="">Gigabyte</option>
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

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
