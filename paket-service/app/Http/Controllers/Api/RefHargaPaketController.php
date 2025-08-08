<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RefHargaPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RefHargaPaketController extends Controller
{
    /**
     * Tampilkan semua data harga paket.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $data = RefHargaPaket::orderBy('log_key', 'asc')->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'data' => $data->items(),
            'current_page' => $data->currentPage(),
            'last_page' => $data->lastPage(),
            'total' => $data->total(),
        ]);
    }

    /**
     * Tampilkan satu data harga paket.
     */
    public function show($id)
    {
        $paket = RefHargaPaket::where('log_key', $id)->first();

        if (!$paket) {
            // Perbaikan: Mengembalikan format JSON yang konsisten untuk error
            return response()->json(['status' => 'error', 'message' => 'Paket tidak ditemukan'], 404);
        }

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json([
            'status' => 'success',
            'data' => $paket,
        ]);
    }

    /**
     * Simpan data harga paket baru.
     */
    public function store(Request $request)
    {
        // Perbaikan: Menambahkan log untuk debugging
        Log::info('API Store Harga Paket: Menerima permintaan untuk menambah data paket baru.', ['data' => $request->all()]);

        $validated = $request->validate([
            'alias_paket'    => 'required|string|max:150',
            'paket'          => 'required|string|max:10',
            'ref_gol'        => 'required|string|max:10',
            'dpp'            => 'nullable|numeric',
            'ppn'            => 'nullable|numeric',
            'total_amount'   => 'nullable|numeric',
            'margin'         => 'nullable|numeric',
            'status'         => 'nullable|string',
            'create_log'     => 'nullable|date',
            'jenis_paket'    => 'nullable|string|max:100',
        ]);

        try {
            // Perbaikan: Menangani proses penyimpanan dengan try...catch
            $paket = RefHargaPaket::create($validated);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan paket baru: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan paket.'], 500);
        }

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json([
            'status' => 'success',
            'message' => 'Paket berhasil ditambahkan',
            'data' => $paket,
        ], 201);
    }

    /**
     * Perbarui data harga paket.
     */
    public function update(Request $request, $id)
    {
        // Perbaikan: Menambahkan log untuk debugging
        Log::info('API Update Harga Paket: Menerima permintaan untuk memperbarui data paket.', ['id' => $id, 'data' => $request->all()]);

        $paket = RefHargaPaket::where('log_key', $id)->first();

        if (!$paket) {
            // Perbaikan: Mengembalikan format JSON yang konsisten untuk error
            return response()->json(['status' => 'error', 'message' => 'Paket tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'alias_paket'    => 'sometimes|required|string|max:150',
            'paket'          => 'sometimes|required|string|max:10',
            'ref_gol'        => 'sometimes|required|string|max:10',
            'dpp'            => 'nullable|numeric',
            'ppn'            => 'nullable|numeric',
            'total_amount'   => 'nullable|numeric',
            'margin'         => 'nullable|numeric',
            'status'         => 'nullable|string',
            'create_log'     => 'nullable|date',
            'jenis_paket'    => 'nullable|string|max:100',
        ]);

        $paket->update($validated);

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json([
            'status' => 'success',
            'message' => 'Paket berhasil diperbarui',
            'data' => $paket,
        ]);
    }

    /**
     * Hapus data harga paket.
     */
    public function destroy($id)
    {
        $paket = RefHargaPaket::where('log_key', $id)->first();

        if (!$paket) {
            // Perbaikan: Mengembalikan format JSON yang konsisten untuk error
            return response()->json(['status' => 'error', 'message' => 'Paket tidak ditemukan'], 404);
        }

        $paket->delete();

        // Perbaikan: Mengembalikan format JSON yang konsisten
        return response()->json(['status' => 'success', 'message' => 'Paket berhasil dihapus']);
    }

    public function all()
    {
        $allHargaPaket = RefHargaPaket::orderBy('alias_paket')->get();

        return response()->json([
            'status' => 'success',
            'data' => $allHargaPaket
        ]);
    }
}
