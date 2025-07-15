<x-layouts.app :title="__('Categories')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Category</flux:heading>
        <flux:subheading size="lg" class="mb-6">Update data Product Category</flux:subheading>
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

    <form action="{{ route('categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <flux:input 
            label="Name" 
            name="name" 
            class="mb-3" 
            value="{{ old('name', $categories->name) }}" 
        />

        <!-- Deskripsi -->
        <flux:textarea 
            label="Description" 
            name="description" 
            class="mb-3"
        >{{ old('description', $categories->description) }}</flux:textarea>

        <flux:separator />

        <!-- Gambar Saat Ini (Preview) -->
        @if($categories->image)
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Current Image:</label>
                <img src="{{ $categories->image }}" alt="Current Image" class="w-40 rounded shadow">
            </div>
        @endif

        <!-- Upload gambar baru (opsional) -->
        <flux:input 
            label="Upload New Image (optional)" 
            name="image_file" 
            type="file" 
            class="mb-3" 
            accept="image/*" 
        />

        <!-- Atau input URL gambar baru -->
        <flux:input 
            label="Image URL (optional)" 
            name="image_url" 
            type="text" 
            class="mb-3" 
            placeholder="https://example.com/image.jpg" 
            value="{{ old('image_url') }}" 
        />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>
