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
    <div class="container w-1/2 mx-auto">
        <h1 class="text-center my-2 mx-auto font-bold fomt-normal">All Products</h1>
        <a href="{{ route('product.create') }}" class="bg-indigo-600 border rounded mx-auto w-1/2 text-white p-3">Create Product</a>
       <div class="w-full mx-auto mt-12">
           @foreach ($products as $product)
            <div class="border p-3 bg-gray-100 shadow w-full flex shadow-lg">
                <span class="w-1/3">{{ $product->product_name }}</span>
                <span class="w-1/3">{{ $product->cost }}</span>
                <span class="w-1/3">{{ $product->quantity }}</span>
            </div>
           @endforeach
       </div>
    </div>
</x-app-layout>
