<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="prd_name" class="block text-sm font-medium text-gray-700">Product Name</label>
        <input type="text" name="prd_name" id="prd_name" value="{{ old('prd_name', $product->prd_name ?? '') }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            required>
        @error('prd_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="prd_price" class="block text-sm font-medium text-gray-700">Price</label>
        <input type="number" name="prd_price" id="prd_price" value="{{ old('prd_price', $product->prd_price ?? '') }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            step="0.01" required>
        @error('prd_price')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="prd_quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
        <input type="number" name="prd_quantity" id="prd_quantity"
            value="{{ old('prd_quantity', $product->prd_quantity ?? '') }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            required>
        @error('prd_quantity')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="prd_description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="prd_description" id="prd_description" rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('prd_description', $product->prd_description ?? '') }}</textarea>
        @error('prd_description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex justify-end mt-6">
    <a href="{{ route('product.index') }}"
        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg mr-2 transition duration-300">Cancel</a>
    <button type="submit"
        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
        {{ $submitButtonText ?? 'Submit' }}
    </button>
</div>
