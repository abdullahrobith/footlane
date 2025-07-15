<x-layouts.app :title="__('Categories')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Category</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product Categories</flux:subheading>
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

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama Kategori -->
        <flux:input label="Name" name="name" class="mb-3" value="{{ old('name') }}" />

        <!-- Deskripsi -->
        <flux:textarea label="Description" name="description" class="mb-3">{{ old('description') }}</flux:textarea>

        <!-- Separator -->
        <flux:separator />

        <!-- Upload Gambar dari File -->
        <flux:input 
            label="Upload Image (from file)" 
            name="image_file" 
            type="file" 
            class="mb-3" 
            accept="image/*" 
        />

        <!-- Atau input URL gambar -->
        <flux:input 
            label="Image URL (optional)" 
            name="image_url" 
            type="text" 
            class="mb-3" 
            placeholder="https://example.com/image.jpg" 
            value="{{ old('image_url') }}" 
        />

        <flux:separator />

        <!-- Tombol -->
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Simpan</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>
