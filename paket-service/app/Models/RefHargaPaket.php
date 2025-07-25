<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefHargaPaket extends Model
{
    protected $table = 'ref_harga_paket';
    protected $primaryKey = 'log_key';
    public $timestamps = false;

    protected $fillable = [
        'alias_paket',
        'paket',
        'ref_gol',
        'dpp',
        'ppn',
        'total_amount',
        'margin',
        'status',
        'create_log',
        'jenis_paket',
    ];
}
