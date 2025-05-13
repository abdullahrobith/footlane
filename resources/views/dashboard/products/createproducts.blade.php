<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">
            {{ session()->get('successMessage') }}
        </flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">
            {{ session()->get('errorMessage') }}
        </flux:badge>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <flux:input label="Name" name="name" class="mb-3" />
        <flux:textarea label="Description" name="description" class="mb-3" />
        <flux:input label="SKU" name="sku" class="mb-3" />
        <flux:input label="Price" name="price" class="mb-3" />
        <flux:input label="Stock" name="stock" class="mb-3" />
        <flux:select label="Product Category" name="product_category_id" class="mb-3">
            <option value="" disabled selected>Pilih Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </flux:select>
        <flux:input label="Image Url" name="image_url" class="mb-3" />
        <flux:select label="Apakah Barang Masih Aktif?" name="is_active" class="mb-3">
            <option value="" disabled selected>Pilih Kategori</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </flux:select>
        


        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Simpan</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>