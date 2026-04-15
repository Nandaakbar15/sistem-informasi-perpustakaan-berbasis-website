<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Form Ubah Buku</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-sm border border-gray-200 dark:border-gray-700 p-5">
            <form action="/admin/edit-buku/{{ $buku->id_buku }}" method="POST" enctype="multipart/form-data">
                @method('PUT') <input type="hidden" name="gambarLama" value="{{ $buku->gambar }}">
                @csrf

                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <div>
                        <label for="nama_buku"
                            class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Buku</label>
                        <input type="text" id="nama_buku" name="nama_buku"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Contoh: Laskar Pelangi" required
                            value="{{ old('nama_buku', $buku->nama_buku) }}" />
                    </div>

                    <div>
                        <label for="penerbit"
                            class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Penerbit</label>
                        <input type="text" id="penerbit" name="penerbit"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Contoh: Bentang Pustaka" required
                            value="{{ old('penerbit', $buku->penerbit) }}" />
                    </div>

                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Status</label>
                        <select id="status" name="status"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="pinjam" {{ $buku->status == 'pinjam' ? 'selected' : '' }}>Pinjam
                            </option>
                            <option value="kembali" {{ $buku->status == 'kembali' ? 'selected' : '' }}>Kembali
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="gambar"
                            class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Cover Buku</label>
                        <input type="file" name="gambar" id="gambar"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            required accept="image/*">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">PNG, JPG atau JPEG (Max. 2MB).</p>
                    </div>

                </div>

                <div
                    class="flex items-center justify-end space-x-3 mt-6 border-t border-gray-200 dark:border-gray-700 pt-5">
                    <a href="/admin/databuku"
                        class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                        Batal
                    </a>
                    <button type="submit"
                        class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-10 py-2.5 focus:outline-none">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>
    <script text="text/javascript">
        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</x-app-layout>
