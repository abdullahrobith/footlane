<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <flux:input label="Name" name="name" value="{{ old('name', $products->name) }}" class="mb-3" />

        <flux:textarea label="Description" name="description" class="mb-3">{{ old('description', $products->description) }}</flux:textarea>

        <flux:input label="SKU" name="sku" value="{{ old('sku', $products->sku) }}" class="mb-3" />

        <flux:input label="Price" name="price" value="{{ old('price', $products->price) }}" class="mb-3" />

        <flux:input label="Stock" name="stock" value="{{ old('stock', $products->stock) }}" class="mb-3" />

        <flux:select label="Product Category" name="product_category_id" class="mb-3">
            <option value="" disabled {{ old('product_category_id', $products->product_category_id) == '' ? 'selected' : '' }}>Pilih Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('product_category_id', $products->product_category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </flux:select>

        @if($products->image_url)
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Gambar Saat Ini:</label>
                <img src="{{ $products->image_url }}" alt="Current Image" class="w-40 rounded shadow">
            </div>
        @endif

        <flux:input label="Upload Gambar Baru (optional)" name="image_file" type="file" class="mb-3" accept="image/*" />

        <flux:input label="Image URL (optional)" name="image_url" value="{{ old('image_url', $products->image_url) }}" class="mb-3" />

        <flux:select label="Apakah Barang Masih Aktif?" name="is_active" class="mb-3">
            <option value="" disabled {{ old('is_active', $products->is_active) === null ? 'selected' : '' }}>Pilih Kategori</option>
            <option value="1" {{ old('is_active', $products->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ old('is_active', $products->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
        </flux:select>

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>
