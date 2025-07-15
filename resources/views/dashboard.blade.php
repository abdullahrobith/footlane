<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4 bg-gray-50 dark:bg-neutral-900">

        {{-- Baris 1: 3 Kolom --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 flex flex-col items-center justify-center">
                <p class="text-gray-500 dark:text-gray-300 text-sm">Jumlah Kategori</p>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">{{ $jumlahKategori }}</h2>
            </div>

            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 flex flex-col items-center justify-center">
                <p class="text-gray-500 dark:text-gray-300 text-sm">Jumlah Produk</p>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">{{ $jumlahProduk }}</h2>
            </div>
        </div>
    </div>
</x-layouts.app>
