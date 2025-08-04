<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Log; // Import kelas Log

class UnitController extends Controller
{
    /**
     * Tampilkan semua unit.
     * Secara default, diurutkan dari terbaru (DESC)
     */
    public function index()
    {
        // Perbaikan: Menggunakan pengurutan agar data terbaru muncul di atas
        $units = Unit::orderByDesc('id')->get();

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json([
            'status' => 'success',
            'data' => $units,
        ]);
    }

    /**
     * Simpan unit baru.
     */
    public function store(Request $request)
    {
        // Perbaikan: Menambahkan log untuk debugging
        Log::info('API Store Unit: Menerima permintaan untuk menambah unit baru.', ['data' => $request->all()]);

        $request->validate([
            'nama_unit' => 'required|string|max:255',
        ]);

        try {
            // Perbaikan: Tidak perlu secara manual memasukkan 'created_at'
            $unit = Unit::create(['nama_unit' => $request->nama_unit]);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan unit baru: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan unit.'], 500);
        }

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json([
            'status'  => 'success',
            'message' => 'Unit berhasil ditambahkan',
            'data'    => $unit,
        ], 201);
    }

    /**
     * Tampilkan satu unit berdasarkan ID.
     */
    public function show($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            // Perbaikan: Mengembalikan format JSON yang konsisten
            return response()->json(['status' => 'error', 'message' => 'Unit tidak ditemukan'], 404);
        }

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json(['status' => 'success', 'data' => $unit]);
    }

    /**
     * Perbarui unit yang ada.
     */
    public function update(Request $request, $id)
    {
        // Perbaikan: Menambahkan log untuk debugging
        Log::info('API Update Unit: Menerima permintaan untuk memperbarui unit.', ['id' => $id, 'data' => $request->all()]);

        $unit = Unit::find($id);

        if (!$unit) {
            // Perbaikan: Mengembalikan format JSON yang konsisten
            return response()->json(['status' => 'error', 'message' => 'Unit tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_unit' => 'required|string|max:255',
        ]);

        $unit->update(['nama_unit' => $request->nama_unit]);

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json([
            'status'  => 'success',
            'message' => 'Unit berhasil diperbarui',
            'data'    => $unit
        ]);
    }

    /**
     * Hapus unit.
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            // Perbaikan: Mengembalikan format JSON yang konsisten
            return response()->json(['status' => 'error', 'message' => 'Unit tidak ditemukan'], 404);
        }

        $unit->delete();

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json(['status' => 'success', 'message' => 'Unit berhasil dihapus']);
    }
}