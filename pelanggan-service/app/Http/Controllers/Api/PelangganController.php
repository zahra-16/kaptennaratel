<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PelangganController extends Controller
{
    public function index()
    {
        $pelangganList = Pelanggan::all();

        $data = $pelangganList->map(function ($pelanggan) {
            return $this->formatPelangganData($pelanggan);
        });

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan'     => 'required|string|max:100',
            'unit_id'            => 'required|integer',
            'harga_paket_id'     => 'nullable|integer',
            'alamat_pelanggan'   => 'nullable|string|max:200',
            'telp_user'          => 'nullable|string|max:100',
            'rt'                 => 'nullable|string|max:10',
            'rw'                 => 'nullable|string|max:10',
            'kelurahan_id'       => 'nullable|string|max:150',
            'kecamatan'          => 'nullable|string|max:150',
            'id_telegram'        => 'nullable|string|max:100',
            'status_log'         => 'nullable|string|max:255',
            'status_followup'    => 'nullable|string|max:100',
            'stts_send_survei'   => 'nullable|string|max:255',
            'log_aktivasi'       => 'nullable|date',
            'va_bri'             => 'nullable|string|max:150',
            'va_bca'             => 'nullable|string|max:150',
            'no_combo'           => 'nullable|string|max:100',
            'log_username_dcp'   => 'nullable|string|max:200',
            'pendaftaran_id'     => 'nullable|string|max:100',
        ]);

        // Validasi unit
        $unitResponse = Http::timeout(3)->get(env('UNIT_SERVICE_URL') . "/api/units/{$validated['unit_id']}");
        if ($unitResponse->failed()) {
            return response()->json(['status' => 'error', 'message' => 'Unit tidak ditemukan'], 404);
        }

        // Validasi harga paket jika disertakan
        if (!empty($validated['harga_paket_id'])) {
            $paketResponse = Http::timeout(3)->get(env('HARGA_PAKET_SERVICE_URL') . "/api/harga-paket/{$validated['harga_paket_id']}");
            if ($paketResponse->failed()) {
                return response()->json(['status' => 'error', 'message' => 'Harga paket tidak ditemukan'], 404);
            }
        }

        // Buat kode pelanggan otomatis
        $last = Pelanggan::orderByDesc('id')->first();
        $nextId = $last ? $last->id + 1 : 1;
        $kodePelanggan = 'PLG' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $pelanggan = Pelanggan::create(array_merge($validated, [
            'kode_pelanggan' => $kodePelanggan,
        ]));

        return response()->json([
            'status'  => 'success',
            'message' => 'Pelanggan berhasil ditambahkan',
            'data'    => $this->formatPelangganData($pelanggan),
        ], 201);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['status' => 'error', 'message' => 'Pelanggan tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $this->formatPelangganData($pelanggan),
        ]);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['status' => 'error', 'message' => 'Pelanggan tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_pelanggan'     => 'sometimes|string|max:100',
            'unit_id'            => 'sometimes|integer',
            'harga_paket_id'     => 'nullable|integer',
            'alamat_pelanggan'   => 'nullable|string|max:200',
            'telp_user'          => 'nullable|string|max:100',
            'rt'                 => 'nullable|string|max:10',
            'rw'                 => 'nullable|string|max:10',
            'kelurahan_id'       => 'nullable|string|max:150',
            'kecamatan'          => 'nullable|string|max:150',
            'id_telegram'        => 'nullable|string|max:100',
            'status_log'         => 'nullable|string|max:255',
            'status_followup'    => 'nullable|string|max:100',
            'stts_send_survei'   => 'nullable|string|max:255',
            'log_aktivasi'       => 'nullable|date',
            'va_bri'             => 'nullable|string|max:150',
            'va_bca'             => 'nullable|string|max:150',
            'no_combo'           => 'nullable|string|max:100',
            'log_username_dcp'   => 'nullable|string|max:200',
            'pendaftaran_id'     => 'nullable|string|max:100',
        ]);

        if (isset($validated['unit_id'])) {
            $unitResponse = Http::timeout(3)->get(env('UNIT_SERVICE_URL') . "/api/units/{$validated['unit_id']}");
            if ($unitResponse->failed()) {
                return response()->json(['status' => 'error', 'message' => 'Unit tidak valid'], 404);
            }
        }

        if (isset($validated['harga_paket_id'])) {
            $paketResponse = Http::timeout(3)->get(env('HARGA_PAKET_SERVICE_URL') . "/api/harga-paket/{$validated['harga_paket_id']}");
            if ($paketResponse->failed()) {
                return response()->json(['status' => 'error', 'message' => 'Harga paket tidak valid'], 404);
            }
        }

        $pelanggan->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'Pelanggan berhasil diperbarui',
            'data'    => $this->formatPelangganData($pelanggan),
        ]);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['status' => 'error', 'message' => 'Pelanggan tidak ditemukan'], 404);
        }

        $pelanggan->delete();

        return response()->json(['status' => 'success', 'message' => 'Pelanggan berhasil dihapus']);
    }

    private function formatPelangganData($pelanggan)
    {
        $unit = ['id' => $pelanggan->unit_id, 'nama' => 'Data unit tidak tersedia'];
        $harga = ['id' => $pelanggan->harga_paket_id, 'keterangan' => 'Data harga paket tidak tersedia'];

        // Ambil data unit dari service eksternal
        if ($pelanggan->unit_id) {
            try {
                $response = Http::timeout(3)->get(env('UNIT_SERVICE_URL') . "/api/units/{$pelanggan->unit_id}");
                if ($response->successful()) {
                    $json = $response->json();
                    $data = $json['data'] ?? $json;
                    if (isset($data['nama_unit'])) {
                        $unit = ['id' => $pelanggan->unit_id, 'nama' => $data['nama_unit']];
                    }
                }
            } catch (\Exception $e) {
                Log::error("Gagal ambil unit: " . $e->getMessage());
            }
        }

        // Ambil data harga paket dari service eksternal
        if ($pelanggan->harga_paket_id) {
            try {
                $response = Http::timeout(3)->get(env('HARGA_PAKET_SERVICE_URL') . "/api/harga-paket/{$pelanggan->harga_paket_id}");
                if ($response->successful()) {
                    $json = $response->json();
                    $data = $json['data'] ?? $json;
                    if (isset($data['alias_paket'])) {
                        $harga = $data;
                        $harga['id'] = $pelanggan->harga_paket_id;
                    }
                }
            } catch (\Exception $e) {
                Log::error("Gagal ambil harga paket: " . $e->getMessage());
            }
        }

        return [
            'id'                => $pelanggan->id,
            'kode_pelanggan'    => $pelanggan->kode_pelanggan,
            'nama_pelanggan'    => $pelanggan->nama_pelanggan,
            'alamat'            => $pelanggan->alamat_pelanggan,
            'telp'              => $pelanggan->telp_user,
            'unit'              => $unit,
            'harga_paket'       => $harga,
            'rt'                => $pelanggan->rt,
            'rw'                => $pelanggan->rw,
            'kelurahan_id'      => $pelanggan->kelurahan_id,
            'kecamatan'         => $pelanggan->kecamatan,
            'id_telegram'       => $pelanggan->id_telegram,
            'status_log'        => $pelanggan->status_log,
            'status_followup'   => $pelanggan->status_followup,
            'stts_send_survei'  => $pelanggan->stts_send_survei,
            'log_aktivasi'      => $pelanggan->log_aktivasi,
            'va_bri'            => $pelanggan->va_bri,
            'va_bca'            => $pelanggan->va_bca,
            'no_combo'          => $pelanggan->no_combo,
            'log_username_dcp'  => $pelanggan->log_username_dcp,
            'pendaftaran_id'    => $pelanggan->pendaftaran_id,
            'created_at'        => $pelanggan->created_at,
        ];
    }
}
