<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

/**
 * Controller untuk mengelola data Mahasiswa via API
 */
class MahasiswaController extends Controller
{
    /**
     * Menampilkan semua data mahasiswa
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $mahasiswas = Mahasiswa::orderBy('id', 'desc')->get();

        $total = $mahasiswas->count();

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diambil',
            'total' => $total,
            'data' => $mahasiswas,
        ], 200);
    }

    /**
     * Menampilkan satu data mahasiswa berdasarkan ID (optional)
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diambil',
            'data' => $mahasiswa,
        ], 200);
    }
    public function shiw($nama)
    {
        $mahasiswa = Mahasiswa::whereRaw('LOWER(nama) LIKE ?', ['%' . strtolower($nama) . '%'])->get();

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa tidak ditemukan',
            ], status: 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diambil',
            'data' => $mahasiswa,
        ], 200);
    }


    public function shaw($nim)
    {
        $mahasiswa = Mahasiswa::whereRaw('LOWER(nim) LIKE ?', ['%' . strtolower($nim) . '%'])->get();

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa tidak ditemukan',
            ], status: 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diambil',
            'data' => $mahasiswa,
        ], 200);
    }
}
