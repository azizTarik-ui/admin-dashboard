<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Add New Category') }}
            </h2>

        </div>

    <div class="container mt-5">



        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name *</label>
                <input type="text" name="name" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </x-slot>
</x-app-layout>
