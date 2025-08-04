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
        // --- PERBAIKAN: Mengurutkan data dari yang terlama ke terbaru (ASC) ---
        // Sehingga data yang baru ditambahkan akan muncul di paling bawah.
        $pelangganList = Pelanggan::orderBy('created_at')->get();

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
        Log::info('API Store: Menerima permintaan untuk menambah pelanggan baru.', ['data' => $request->all()]);

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

        $unitResponse = Http::timeout(3)->get(env('UNIT_SERVICE_URL') . "/api/units/{$validated['unit_id']}");
        if ($unitResponse->failed()) {
            return response()->json(['status' => 'error', 'message' => 'Unit tidak ditemukan'], 404);
        }

        if (!empty($validated['harga_paket_id'])) {
            $paketResponse = Http::timeout(3)->get(env('HARGA_PAKET_SERVICE_URL') . "/api/harga-paket/{$validated['harga_paket_id']}");
            if ($paketResponse->failed()) {
                return response()->json(['status' => 'error', 'message' => 'Harga paket tidak ditemukan'], 404);
            }
        }

        try {
            $last = Pelanggan::orderByDesc('id')->first();
            $nextId = $last ? $last->id + 1 : 1;
            $kodePelanggan = 'PLG' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

            $pelanggan = new Pelanggan();
            $pelanggan->kode_pelanggan = $kodePelanggan;
            $pelanggan->nama_pelanggan = $validated['nama_pelanggan'];
            $pelanggan->unit_id = $validated['unit_id'];
            $pelanggan->harga_paket_id = $validated['harga_paket_id'] ?? null;
            $pelanggan->alamat_pelanggan = $validated['alamat_pelanggan'] ?? null;
            $pelanggan->telp_user = $validated['telp_user'] ?? null;
            $pelanggan->rt = $validated['rt'] ?? null;
            $pelanggan->rw = $validated['rw'] ?? null;
            $pelanggan->kelurahan_id = $validated['kelurahan_id'] ?? null;
            $pelanggan->kecamatan = $validated['kecamatan'] ?? null;
            $pelanggan->id_telegram = $validated['id_telegram'] ?? null;
            $pelanggan->status_log = $validated['status_log'] ?? null;
            $pelanggan->status_followup = $validated['status_followup'] ?? null;
            $pelanggan->stts_send_survei = $validated['stts_send_survei'] ?? null;
            $pelanggan->log_aktivasi = $validated['log_aktivasi'] ?? null;
            $pelanggan->va_bri = $validated['va_bri'] ?? null;
            $pelanggan->va_bca = $validated['va_bca'] ?? null;
            $pelanggan->no_combo = $validated['no_combo'] ?? null;
            $pelanggan->log_username_dcp = $validated['log_username_dcp'] ?? null;
            $pelanggan->pendaftaran_id = $validated['pendaftaran_id'] ?? null;
            $pelanggan->save();
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan pelanggan baru: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan pelanggan baru.'], 500);
        }

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
        Log::info('API Update: Menerima permintaan untuk memperbarui pelanggan.', ['id' => $id, 'data' => $request->all()]);

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
            'id'                 => $pelanggan->id,
            'kode_pelanggan'     => $pelanggan->kode_pelanggan,
            'nama_pelanggan'     => $pelanggan->nama_pelanggan,
            'alamat'             => $pelanggan->alamat_pelanggan,
            'telp'               => $pelanggan->telp_user,
            'unit'               => $unit,
            'harga_paket'        => $harga,
            'rt'                 => $pelanggan->rt,
            'rw'                 => $pelanggan->rw,
            'kelurahan_id'       => $pelanggan->kelurahan_id,
            'kecamatan'          => $pelanggan->kecamatan,
            'id_telegram'        => $pelanggan->id_telegram,
            'status_log'         => $pelanggan->status_log,
            'status_followup'    => $pelanggan->status_followup,
            'stts_send_survei'   => $pelanggan->stts_send_survei,
            'log_aktivasi'       => $pelanggan->log_aktivasi,
            'va_bri'             => $pelanggan->va_bri,
            'va_bca'             => $pelanggan->va_bca,
            'no_combo'           => $pelanggan->no_combo,
            'log_username_dcp'   => $pelanggan->log_username_dcp,
            'pendaftaran_id'     => $pelanggan->pendaftaran_id,
            'created_at'         => $pelanggan->created_at,
        ];
    }
}