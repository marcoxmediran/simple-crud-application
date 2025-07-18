<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <div class="flex justify-between items-start">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->prd_name }}</h1>
            <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">&larr; Back to
                Products</a>
        </div>

        <div class="border-t border-gray-200 pt-4">
            <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-8">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Product ID</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $product->prd_id }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Quantity in Stock</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $product->prd_quantity }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Price</dt>
                    <dd class="mt-1 text-sm text-gray-900">PHP {{ number_format($product->prd_price, 2) }}</dd>
                </div>
                <div class="sm:col-span-3">
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $product->prd_description ?: 'No description provided.' }}
                    </dd>
                </div>
                <div class="sm:col-span-3">
                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $product->created_at->format('M d, Y h:i A') }}</dd>
                </div>
                <div class="sm:col-span-3">
                    <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $product->updated_at->format('M d, Y h:i A') }}</dd>
                </div>
            </dl>
        </div>
        <div class="mt-6 border-t border-gray-200 pt-6 flex justify-end">
            <a href="{{ route('product.edit', $product) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Edit Product
            </a>
        </div>
    </div>
</x-layout>
