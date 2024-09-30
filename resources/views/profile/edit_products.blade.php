<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Edit Product') }}
            </h2>

        </div>
        <div class="container mt-5">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label>Category</label>
                    <select name = "category_id" class="form-control">
                        @foreach ($categories as $category)
                            {{-- <option value="{{  $category->id }}">{{  $category->name }}</option> --}}
                            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name *</label>
                    <input type="text" value="{{ $product->name }}" name="name" class="form-control"
                        value="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price *</label>
                    <input type="text" value="{{ $product->price }}" name="price" class="form-control"
                        value="">
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






                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </x-slot>


</x-app-layout>
