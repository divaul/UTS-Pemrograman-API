<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Mahasiswa
 * Merepresentasikan tabel mahasiswas di database
 */
class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     * Laravel secara default akan mencari tabel 'mahasiswas' (plural)
     */
    protected $table = 'mahasiswas';

    /**
     * Kolom yang boleh diisi secara mass assignment
     * Melindungi dari mass assignment vulnerability
     */
    protected $fillable = [
        'nama',
        'nim'
    ];

    /**
     * Kolom yang di-cast ke tipe data tertentu
     * Memastikan id selalu integer
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
