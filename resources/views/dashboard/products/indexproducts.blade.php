<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product</flux:heading>
            <flux:separator variant="subtle" />
    </div>
    <div class="flex items-center justify-between mb-4">
        <!-- Tombol Tambah Data -->
        <flux:button variant="primary" color="primary" href="{{ route('products.create') }}">
            Tambah Data
        </flux:button>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('products.index') }}" class="flex items-center space-x-2">
            <flux:input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}"
                size="sm" />
            <flux:button type="submit" variant="outline" size="sm">
                Cari
            </flux:button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
                    text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
                text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Slug
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
            text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Description
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
        text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        SKU
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Price
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Stock
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Product Category
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Image
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Is Active
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        On/Off
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Created At
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left 
text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $key + 1 }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $product->name }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $product->slug }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">
                                {{  $product->description }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">
                                {{  $product->sku }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">
                                {{  $product->stock }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">
                                {{ $product->category->name ?? 'Tidak Ada Kategori' }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                        class="h-10 w-10 object-cover rounded">
                                @else
                                    <div class="h-10 w-10 bg-gray-200 flex items-center justify-center rounded">
                                        <span class="text-gray-500 text-sm">N/A</span>
                                    </div>
                                @endif
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900">
                                @if ($product->is_active == 1)
                                    Aktif
                                @else
                                    Tidak Aktif
                                @endif
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <form id="sync-product-{{ $product->id }}" action="{{ route('products.sync', $product->id) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="is_active"
                                    value="@if($product->hub_product_id) 1 @else 0 @endif">
                                @if($product->hub_product_id)
                                    <flux:switch checked
                                        onchange="document.getElementById('sync-product-{{ $product->id }}').submit()" />
                                @else
                                    <flux:switch
                                        onchange="document.getElementById('sync-product-{{ $product->id }}').submit()" />
                                @endif
                            </form>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $product->created_at }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex space-x-2">
                                <!-- Tombol Edit -->
                                <flux:button size="sm" variant="outline" color="primary"
                                    href="{{ route('products.edit', $product->id) }}">
                                    Edit
                                </flux:button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button size="sm" color="destructive" type="submit">
                                        Delete
                                    </flux:button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>