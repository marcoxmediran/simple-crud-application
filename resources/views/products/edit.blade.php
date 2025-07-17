<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Product</h1>

        <form action="{{ route('product.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            @include('products.submit', ['submitButtonText' => 'Update Product'])
        </form>
    </div>
</x-layout>
