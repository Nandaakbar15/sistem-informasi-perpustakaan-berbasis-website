<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    protected $table = "TblBuku";

    protected $primaryKey = 'id_buku';

    protected $fillable = ['nama_buku', 'penerbit', 'gambar', 'status'];

    use HasFactory;
}
