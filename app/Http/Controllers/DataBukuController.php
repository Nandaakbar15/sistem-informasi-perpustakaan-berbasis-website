<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();

        return view("pages.data-buku.indexDatabuku", [
            "buku" => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status_options = ['pinjam', 'kembali'];

        return view("pages.data-buku.tambahDatabuku", compact('status_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi
        $data = $request->validate([
            'nama_buku' => 'required',
            'penerbit'  => 'required',
            'status'    => 'required',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // 2. Handle File Upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan ke storage/app/public/images
            $file->storeAs('images', $fileName, 'public');

            // Simpan path relatif "images/namafile.jpg" ke database
            $data['gambar'] = 'images/' . $fileName;
        }

        // 3. Simpan (Gunakan variabel $data yang sudah diupdate gambarnya)
        Buku::create($data);

        return redirect('/admin/data-buku')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view("pages.data-buku.detailBuku", [
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view("pages.data-buku.updateDatabuku", [
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validateData = $request->validate([
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Tidak perlu required
        ]);

        if ($request->hasFile('gambar')) {
            // 1. Hapus gambar lama dari folder storage
            if ($request->gambarLama) {
                Storage::disk('public')->delete($request->gambarLama);
            }

            // 2. Upload gambar baru
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'public');

            // 3. Masukkan path ke array data (tanpa prefix /storage/)
            $validateData['gambar'] = 'images/' . $fileName;
        }

        // Jika tidak ada gambar baru, $validateData['gambar'] otomatis tidak ada,
        // sehingga data gambar lama di DB tidak akan berubah.

        $buku->update($validateData);

        return redirect('/admin/data-buku')->with('success', 'Berhasil mengupdate data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect('/admin/data-buku')->with('success_delete', 'Berhasil menghapus data!');
    }
}
