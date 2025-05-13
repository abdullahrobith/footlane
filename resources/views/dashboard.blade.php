<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-4 bg-gray-50 dark:bg-neutral-900">
    {{-- Baris 1: 3 Kolom --}}
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        @for ($i = 1; $i <= 3; $i++)
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 flex items-center justify-center">
                <p class="text-gray-500 dark:text-gray-300 text-lg">Card {{ $i }}</p>
            </div>
        @endfor
    </div>

    {{-- Baris 2: 1 Kontainer besar --}}
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 flex items-center justify-center">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
            Selamat Datang, FAHRI
        </h1>
    </div>
</div>
</x-layouts.app>
