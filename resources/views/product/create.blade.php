<x-app-layout>
    @if (Session::has('success'))
        <x-success>
            {{ session()->get('success') }}
        </x-success>
    @endif
    @if (Session::has('errors'))
        <x-error>
            {{ session()->get('errors') }}
        </x-error>
    @endif
    <div class="container">
        <h1 class="text-center my-2 mx-auto">Add Product</h1>

        <div class="p-5 bg-pink-100 shadow d-flex w-1/2 mx-auto">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <input type="text" placeholder="Product name" name="product_name" class="w-full shadow border border-indigo-300 rounded my-3">
                <input type="number" placeholder="Product Cost" name="cost" class="w-full shadow border border-indigo-300 rounded my-3">
                <input type="text" placeholder="Product Quantity" name="product_qty" class="w-full shadow border border-indigo-300 rounded my-3">
                <button type="submit" class="text-white p-2 w-1/2 shadow border border-indigo-300 bg-indigo-600 rounded my-3">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
