<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col items-center justify-center gap-6 p-6 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-neutral-900 dark:to-neutral-800">

        {{-- Sambutan Admin --}}
        <div class="text-center mb-4">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">Selamat datang kembali, ADMIN! 👋</h1>
            <p class="text-gray-500 dark:text-gray-300 text-sm mt-1">Semoga harimu harimu dipertemukan dengan darksystem yang mengharuskanmu untuk bekerja lebih keras lagi 💀</p>
        </div>

        {{-- Dua kotak berdampingan --}}
        <div class="flex w-full max-w-5xl justify-between gap-6">
            {{-- Box: Jumlah Kategori --}}
            <div class="flex-1 min-h-[220px] rounded-xl border border-orange-300 dark:border-orange-600 
                        bg-gradient-to-br from-orange-100 to-orange-300 dark:from-orange-800 dark:to-orange-600 
                        shadow-md hover:shadow-lg 
                        flex flex-col items-center justify-center text-center gap-2 p-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-700 dark:text-indigo-200 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2h-4M4 17v-6a2 2 0 012-2h4m0 0h4a2 2 0 012 2v6a2 2 0 01-2 2h-4a2 2 0 01-2-2z" />
                </svg>
                <p class="text-indigo-900 dark:text-indigo-100 text-base font-semibold">Jumlah Kategori</p>
                <h2 class="text-4xl font-bold text-indigo-950 dark:text-white">{{ $jumlahKategori }}</h2>
            </div>

            {{-- Box: Jumlah Produk --}}
            <div class="flex-1 min-h-[220px] rounded-xl border border-orange-300 dark:border-orange-600 
                        bg-gradient-to-br from-orange-100 to-orange-300 dark:from-orange-800 dark:to-orange-600 
                        shadow-md hover:shadow-lg 
                        flex flex-col items-center justify-center text-center gap-2 p-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-700 dark:text-emerald-200 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18m-9-9v18" />
                </svg>
                <p class="text-emerald-900 dark:text-emerald-100 text-base font-semibold">Jumlah Produk</p>
                <h2 class="text-4xl font-bold text-emerald-950 dark:text-white">{{ $jumlahProduk }}</h2>
            </div>
        </div>
    </div>
</x-layouts.app>
