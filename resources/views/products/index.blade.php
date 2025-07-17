<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Products</h1>
            <a href="{{ route('product.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Add New Product
            </a>
        </div>

        <!-- Search Form -->
        <div class="mb-6">
            <form action="{{ route('product.index') }}" method="GET" class="flex items-center w-full md:w-2/3 lg:w-1/2">
                <input type="text" name="search" placeholder="Search by name or description..."
                    value="{{ $search ?? '' }}"
                    class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg transition duration-300">Search</button>
                @if ($search)
                    <a href="{{ route('product.index') }}"
                        class="ml-4 text-sm text-gray-600 hover:text-gray-800 whitespace-nowrap">Clear Search</a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">
                            {{-- Sort by prd_name --}}
                            <a href="{{ route('product.index', array_merge(request()->query(), ['sort_by' => 'prd_name', 'sort_dir' => $sortBy == 'prd_name' && $sortDir == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center">
                                Name
                                @if ($sortBy == 'prd_name')
                                    <span class="ml-2">{{ $sortDir == 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-6 text-center">
                            {{-- Sort by prd_quantity --}}
                            <a href="{{ route('product.index', array_merge(request()->query(), ['sort_by' => 'prd_quantity', 'sort_dir' => $sortBy == 'prd_quantity' && $sortDir == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center justify-center">
                                Quantity
                                @if ($sortBy == 'prd_quantity')
                                    <span class="ml-2">{{ $sortDir == 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-6 text-center">
                            {{-- Sort by prd_price --}}
                            <a href="{{ route('product.index', array_merge(request()->query(), ['sort_by' => 'prd_price', 'sort_dir' => $sortBy == 'prd_price' && $sortDir == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center justify-center">
                                Price
                                @if ($sortBy == 'prd_price')
                                    <span class="ml-2">{{ $sortDir == 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse ($products as $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $product->prd_id }}</td>
                            <td class="py-3 px-6 text-left">
                                <a href="{{ route('product.show', $product) }}"
                                    class="font-medium text-blue-600 hover:text-blue-800">{{ $product->prd_name }}</a>
                            </td>
                            <td class="py-3 px-6 text-center">{{ $product->prd_quantity }}</td>
                            <td class="py-3 px-6 text-center">PHP {{ number_format($product->prd_price, 2) }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a href="{{ route('product.edit', $product) }}"
                                        class="px-3 py-1 rounded bg-yellow-500 font-bold text-white text-sm mr-2 hover:bg-yellow-600 transition duration-300"
                                        title="Edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('product.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 font-bold text-white text-sm hover:bg-red-600 transition duration-300"
                                            title="Delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-layout>
