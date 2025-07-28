<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // Nama tabel di database
    protected $table = 'pelanggan';

    // Kolom-kolom yang boleh diisi secara massal (fillable)
    protected $fillable = [
        'kode_pelanggan',        // Auto-generated kode unik pelanggan (ex: PLG001)
        'nama_pelanggan',
        'password_pelanggan',    // Jika digunakan (opsional), bisa disimpan hash
        'alamat_pelanggan',
        'rt',
        'rw',
        'kelurahan_id',
        'kecamatan',
        'telp_user',
        'id_telegram',
        'status_log',            // Status internal atau log proses
        'status_followup',       // Status follow-up pelanggan
        'stts_send_survei',      // Status pengiriman survei
        'log_aktivasi',
        'va_bri',
        'va_bca',
        'unit_id',               // Relasi ke unit-service (via API, bukan FK)
        'harga_paket_id',        // Relasi ke harga-paket-service
        'no_combo',              // Nomor combo / kode teknis
        'log_username_dcp',      // Log teknisi/agen
        'pendaftaran_id',        // ID dari pendaftaran awal (opsional)
    ];

    // Jika menggunakan kolom created_at dan updated_at
    public $timestamps = true;
}
