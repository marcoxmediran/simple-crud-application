<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Product</h1>

        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            @include('products.submit', ['submitButtonText' => 'Create Product'])
        </form>
    </div>
</x-layout>
