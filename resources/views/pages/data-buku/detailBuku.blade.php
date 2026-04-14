<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Detail buku</h1>
            </div>

        </div>

        <!-- Cards -->
        <div
            class="bg-white dark:bg-gray-800 shadow-lg rounded-sm border border-gray-200 p-5 flex flex-col md:flex-row gap-8">

            <div class="shrink-0">
                <img class="rounded-lg shadow-md w-full md:w-52 object-cover"
                    src="{{ asset('storage/' . $buku->gambar) }}" alt="{{ $buku->nama_buku }}">
            </div>

            <div class="flex flex-col justify-center">
                <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2">{{ $buku->nama_buku }}</h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">Penerbit: <span
                        class="font-medium">{{ $buku->penerbit }}</span></p>

                <div>
                    <a href="/admin/data-buku"
                        class="btn bg-white border-gray-200 hover:border-gray-300 text-indigo-500">
                        <svg class="w-4 h-4 fill-current rotate-180 mr-2" viewBox="0 0 16 16">
                            <path d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
